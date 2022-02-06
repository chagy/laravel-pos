<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use Cart;

class PosProductEdit extends Component
{
    public $productId=0;
    public $unit="";
    public $quantity=0;
    public $price=0;
    public $discountItem=0;

    protected $listeners = [
        'posProductEdit' => 'edit'
    ];

    public function edit($id)
    {
        $product = Cart::get($id);
    
        $this->productId = $product->id;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->discountItem = $product->attributes->psod_item_discount;
        $this->unit = $product->attributes->psod_item_unit;
    }

    public function save()
    {
        Cart::update($this->productId,[
            'quantity' => [
                'relative' => false,
                'value' => $this->quantity
            ],
            'price' => $this->price,
            'attributes' => [
                'dateOrder' => date('YmdHis'),
                'psod_item_unit' => $this->unit,
                'psod_item_price' => $this->price,
                'psod_item_discount' => $this->discountItem,
                'psod_item_discount_total' => $this->discountItem * $this->quantity,
            ]
        ]);

        $this->emit('posCartRefresh');

        $this->emit("modalHide");
    }

    public function render()
    {
        return view('livewire.pos.pos-product-edit');
    }
}
