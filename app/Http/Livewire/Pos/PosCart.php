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

    public function deleteProduct($id)
    {
        Cart::remove($id);
        $this->mount();
    }

    public function cartUpdate()
    {
        $this->mount();
    }

    public function mount()
    {
        $cart = Cart::getContent()->sortByDesc(function($product,$key){
            return $product->attributes->dateOrder;
        });

        $this->items = $cart->values()->toArray();

        $this->total = Cart::getTotal();
    }
    
    public function render()
    {
        return view('livewire.pos.pos-cart');
    }
}
