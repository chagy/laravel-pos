<?php

namespace App\Http\Livewire\Import;

use App\Models\Product;
use Livewire\Component;

class SelectProduct extends Component
{
    public $searchTerm;

    public function render()
    {
        $products = Product::where('prod_status',1);

        if($this->searchTerm){
            $products = $products->where('prod_name','LIKE',"%{$this->searchTerm}%");
        }

        $products = $products->limit(10)->get();

        return view('livewire.import.select-product',[
            'products' => $products
        ]);
    }
}
