<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductDiscountPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm = '';

    public function render()
    {
        $products = Product::query();

        if($this->searchTerm){
            $products = $products 
                            ->where('prod_name','LIKE',"%{$this->searchTerm}%");
        }

        $products = $products 
                        ->paginate(20);

        return view('livewire.product.product-discount-page',[
            'products' => $products
        ])->extends('layouts.main');
    }
}
