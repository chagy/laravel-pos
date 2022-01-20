<?php

namespace App\Http\Livewire\Pos;

use App\Models\Product;
use Livewire\Component;

class PosProductBox extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.pos.pos-product-box');
    }
}
