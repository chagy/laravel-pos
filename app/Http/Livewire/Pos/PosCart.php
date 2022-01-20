<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

class PosCart extends Component
{
    public $discount=0;
    public $total = 0;
    public $customerData;
    public $items = [];
    
    public function render()
    {
        return view('livewire.pos.pos-cart');
    }
}
