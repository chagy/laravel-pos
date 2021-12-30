<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category;

class ProductFormPage extends Component
{
    public $category_id;
    public $prod_name;
    public $prod_unit;
    public $prod_cost;
    public $prod_price;
    public $prod_qty;
    public $prod_discount;
    public $prod_bar_code;
    public $prod_picture;
    public $prod_status = 1;

    public function render()
    {
        return view('livewire.product.product-form-page',[
                'categories' => Category::where('cate_status',1)->get()
            ])->extends('layouts.main');
    }
}
