<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    protected $listeners = [
        'refreshProductList' => '$refresh'
    ];

    public function render()
    {
        $products = Product::query();

        if($this->searchTerm){
            $products = $products
                            ->where('prod_name','LIKE',"%{$this->searchTerm}%");
        }

        $products = $products->paginate(15);
        return view('livewire.product.product-list-page',[
            'products' => $products
        ])->extends('layouts.main');
    }
}
