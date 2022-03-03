<?php

namespace App\Http\Livewire\Promotion;

use App\Models\Product;
use Livewire\Component;

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
        $this->product_discount = 0;
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

    }

    public function render()
    {
        return view('livewire.promotion.promotion-form-page')->extends('layouts.main');
    }
}
