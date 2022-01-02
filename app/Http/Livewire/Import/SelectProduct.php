<?php

namespace App\Http\Livewire\Import;

use App\Models\Product;
use Livewire\Component;

class SelectProduct extends Component
{
    public function render()
    {
        return view('livewire.import.select-product',[
            'products' => Product::where('prod_status',1)->get()
        ]);
    }
}
