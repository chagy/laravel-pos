<?php

namespace App\Http\Livewire\Pos;

use App\Models\Product;
use Livewire\Component;
use Cart;

class PosProductBox extends Component
{
    public $product;

    public function addCart()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->prod_name,
            'price' => $this->product->prod_price,
            'quantity' => 1,
            'attributes' => [
                'dateOrder' => date('YmdHis'),
                'psod_item_unit' => $this->product->prod_unit,
                'psod_item_price' => $this->product->prod_price,
                'psod_item_discount' => $this->product->prod_discount,
                'psod_item_discount_total' => $this->product->prod_discount,
            ]
        ]);

        $cart = Cart::get($this->product->id);

        Cart::update($this->product->id,[
            'attributes' => [
                'dateOrder' => date('YmdHis'),
                'psod_item_unit' => $this->product->prod_unit,
                'psod_item_price' => $this->product->prod_price,
                'psod_item_discount' => $this->product->prod_discount,
                'psod_item_discount_total' => $this->product->prod_discount * $cart->quantity,
            ]
        ]);

        // Cart::clear();

        $this->emit('posCartRefresh');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.pos.pos-product-box');
    }
}
