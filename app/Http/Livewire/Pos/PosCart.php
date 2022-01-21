<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use Cart;

class PosCart extends Component
{
    public $discount=0;
    public $total = 0;
    public $customerData;
    public $items = [];

    protected $listeners = [
        'posCartRefresh' => 'cartUpdate'
    ];

    public function cartUpdate()
    {
        $this->mount();
    }

    public function mount()
    {
        $this->items = Cart::getContent();
    }
    
    public function render()
    {
        return view('livewire.pos.pos-cart');
    }
}
