<?php

namespace App\Http\Livewire\Promotion;

use App\Models\Product;
use Livewire\Component;
use App\Models\Promotion;
use App\Models\PromotionProduct;
use App\Models\PromotionCondition;
use Illuminate\Support\Facades\DB;

class PromotionFormPage extends Component
{
    public $idKey=0;
    public $prom_name;
    public $prom_begin;
    public $prom_end;
    public $prom_status=1;
    public $prom_desc;

    public $product_qty = [];
    public $product_discount = [];

    public $products = [];
    public $conditions = [];

    protected $listeners = [
        'selectProduct' => 'selectProduct'
    ];

    protected $rules = [
        'prom_name' => 'required',
        'prom_begin' => 'required',
        'prom_end' => 'required',
        'prom_status' => 'required',
        'product_qty.*' => 'required|integer',
        'product_discount.*' => 'required|numeric'
    ];

    public function savePromotion()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $promotion = Promotion::updateOrCreate([
                'id' => $this->idKey
            ],[
                'prom_name' => $this->prom_name,
                'prom_begin' => $this->prom_begin,
                'prom_end' => $this->prom_end,
                'prom_status' => $this->prom_status,
                'prom_desc' => $this->prom_desc,
            ]);


            PromotionProduct::where('promotion_id',$promotion->id)->delete();
            foreach ($this->products as $key => $prod) {
                $promotion->productItems()->create([
                    'product_id' => $prod['product_id']
                ]);
            }

            PromotionCondition::where('promotion_id',$promotion->id)->delete();
            foreach($this->conditions as $key => $con){
                $promotion->conditionItems()->create([
                    'prom_con_qty' => $this->product_qty[$key],
                    'prom_com_discount' => $this->product_discount[$key],
                ]);
            }

            $this->dispatchBrowserEvent('swal',[
                'title' => 'บันทึกข้อมูลสินค้าเรียบร้อย',
                'timer' => 3000,
                'icon' => 'success',
                'url' => $this->idKey > 0 ? route('promotion.edit',$promotion->id)  : route('promotion.list')
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        

        
    }

    public function deleteConditionRow($index)
    {
        unset($this->conditions[$index]);
    }

    public function addCondition()
    {
        $this->conditions[] = [
            'product_qty' => 1,
            'product_discount' => 0
        ];

        $this->product_qty[] = 1;
        $this->product_discount[] = 0;
    }

    public function deleteProductRow($index)
    {
        unset($this->products[$index]);
    }

    public function selectProduct($id)
    {
        $product = Product::findOrFail($id);
        $this->products[] = [
            'product_id' => $product->id,
            'product_name' => $product->prod_name,
            'product_price' => $product->prod_price
        ];
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $promotion = Promotion::findOrFail($id);
            $this->idKey = $promotion->id;
            $this->prom_name = $promotion->prom_name;
            $this->prom_begin = $promotion->prom_begin;
            $this->prom_end = $promotion->prom_end;
            $this->prom_status = $promotion->prom_status;
            $this->prom_desc = $promotion->prom_desc;

            foreach($promotion->productItems as $key => $product)
            {
                $this->products[] = [
                    'product_id' => $product->product_id,
                    'product_name' => $product->product->prod_name,
                    'product_price' => $product->product->prod_price
                ];
            }

            foreach ($promotion->conditionItems as $key => $prom) {
                $this->conditions[] = [
                    'product_qty' => $prom->prom_con_qty,
                    'product_discount' => $prom->prom_com_discount
                ];
        
                $this->product_qty[] = $prom->prom_con_qty;
                $this->product_discount[] = $prom->prom_com_discount;
            }
        }
        
        
    }

    public function render()
    {
        return view('livewire.promotion.promotion-form-page')->extends('layouts.main');
    }
}
