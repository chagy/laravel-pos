<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

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

    public function render()
    {
        return view('livewire.pos.pos-calculator');
    }
}
