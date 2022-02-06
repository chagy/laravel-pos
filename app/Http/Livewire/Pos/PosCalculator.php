<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

class PosCalculator extends Component
{
    public $money = 0;
    public $productTotal = 0;
    public $discount = 0;
    public $customerId = 0;

    protected $listeners = [
        'calculator' => 'handleCal'
    ];

    public function handleCal($total,$discount,$customer)
    {
        $this->productTotal = $total;
        $this->money = 0;
        $this->discount = $discount;
        $this->customerId = $customer;
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


    }

    public function render()
    {
        return view('livewire.pos.pos-calculator');
    }
}
