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
        return view('livewire.pos.pos-page',[
            'categories' => Category::where('cate_status',1)->get(),
            'products' => Product::where('prod_status',1)->where('prod_qty','>',0)->limit(20)->get()
        ])->extends('layouts.main');
    }
}
