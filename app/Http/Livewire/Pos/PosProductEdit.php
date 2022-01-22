<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use Cart;

class PosProductEdit extends Component
{
    public $productId=0;
    public $quantity=0;
    public $price=0;
    public $discount=0;

    protected $listeners = [
        'posProductEdit' => 'edit'
    ];

    public function edit($id)
    {
        $product = Cart::get($id);

        $this->productId = $product->id;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->discount = $product->attributes->discount;
    }

    public function render()
    {
        return view('livewire.pos.pos-product-edit');
    }
}
