<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use Cart;

class PosCart extends Component
{
    public $discount=0;
    public $discountItem = 0;
    public $total = 0;
    public $customerData;
    public $items = [];

    protected $listeners = [
        'posCartRefresh' => 'cartUpdate'
    ];

    public function updatedDiscount()
    {
        $this->total = Cart::getTotal();
        $this->total = $this->total - $this->discount - $this->discountItem;
    }

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

        $this->discountItem = 0;
        foreach ($cart as $key => $value) {
            $this->discountItem += $value->attributes->psod_item_discount_total;
        }

        $this->total = Cart::getTotal() - $this->discount - $this->discountItem;
    }
    
    public function render()
    {

        return view('livewire.pos.pos-cart');
    }
}
