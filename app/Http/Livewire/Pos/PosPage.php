<?php

namespace App\Http\Livewire\Pos;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class PosPage extends Component
{
    public $searchTerm;
    public $category;

    public function render()
    {
        $products = Product::where('prod_status',1)->where('prod_qty','>',0);

        if($this->searchTerm){
            $products = $products 
                            ->where('prod_name','LIKE',"%{$this->searchTerm}%");
        }

        if($this->category > 0){
            $products = $products 
                            ->where('category_id',$this->category);
        }

        $products = $products->limit(20)->get();

        return view('livewire.pos.pos-page',[
            'categories' => Category::where('cate_status',1)->get(),
            'products' => $products
        ])->extends('layouts.main');
    }
}
