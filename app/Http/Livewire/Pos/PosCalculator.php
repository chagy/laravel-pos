<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use App\Models\PosOrder;
use Cart;
use Illuminate\Support\Facades\DB;

class PosCalculator extends Component
{
    public $money = 0;
    public $moneyText = 0;
    public $productTotal = 0;
    public $productTotalText = 0;
    public $discount = 0;
    public $discountText = 0;
    public $customerId = 0;
    public $change=0;
    public $changeText=0;

    protected $listeners = [
        'calculator' => 'handleCal'
    ];

    public function handleCal($total,$discount,$customer)
    {
        $this->productTotal = $total;
        $this->productTotalText = number_format($total,2);
        $this->money = 0;
        $this->moneyText = 0;
        $this->discount = $discount;
        $this->discountText = number_format($discount,2);
        $this->customerId = $customer;
    }

    public function handleTotal()
    {
        $this->money = $this->productTotal;
        $this->moneyText= number_format($this->money,2);

        $this->change = $this->money - $this->productTotal;
        $this->changeText = number_format($this->money - $this->productTotal,2);
    }

    public function handleClick($value,$type="number")
    {
        $money = $this->money;

        if($type == "number")
        {
            $this->money = $money != 0 ? $money.$value : $value;
            
        }
        else 
        {
            $this->money += $value;
        }

        $this->moneyText= number_format($this->money,2);

        $this->change = $this->money - $this->productTotal;
        $this->changeText = number_format($this->money - $this->productTotal,2);
    }

    public function save()
    {
        DB::beginTransaction();
        try {
            $posOrder = PosOrder::create([
                'employee_id' => 1,
                'customer_id' => $this->customerId,
                'psod_qty' => 0,
                'psod_total' => $this->productTotal+$this->discount,
                'psod_discount_extra' => $this->discount,
                'psod_discount_item' => 0,
                'psod_vat' => 0,
                'psod_vat_amount' => 0,
                'psod_net_total' => $this->productTotal,
                'psod_money' => $this->money,
                'psod_change' => $this->change,
                'psod_note' => $this->change,
                'psod_status' => 1,
            ]);

            $items = Cart::getContent();
            $qty = 0;
            $discount = 0;
            foreach ($items as $key => $value) {
                $posOrder->items()->create([
                    'product_id' => $value->id,
                    'psod_item_name' => $value->name,
                    'psod_item_unit' => $value->attributes->psod_item_unit,
                    'psod_item_price' => $value->price,
                    'psod_item_qty'=> $value->quantity,
                    'psod_item_discount' => $value->attributes->psod_item_discount,
                    'psod_item_discount_total' => $value->attributes->psod_item_discount_total,
                ]);
                $qty += $value->quantity;
                $discount += $value->attributes->psod_item_discount_total;
            }

            $posOrder->psod_qty = $qty;
            $posOrder->psod_discount_item = $discount;
            $posOrder->save();

            Cart::clear();

            $this->emit("modalHide");
            $this->emit("posCartRefresh");

            $this->dispatchBrowserEvent('swal',[
                'title' => 'บันทึกข้อมูลการขายเรียบร้อย',
                'timer' => 3000,
                'icon' => 'success',
            ]);

            DB::commit();

            // $this->emit('openPrintModal',$posOrder->id);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
        
    }

    public function clearMoney()
    {
        $this->money = 0;
        $this->moneyText = 0;

        $this->change = 0;
        $this->changeText = 0;
    }

    public function render()
    {
        return view('livewire.pos.pos-calculator');
    }
}
