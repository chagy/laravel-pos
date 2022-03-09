<?php

namespace App\Http\Livewire\Pos;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Cart;
use Helper;

class PosPage extends Component
{
    public $searchTerm;
    public $category;
    public $barQr = 1;

    public function addCart()
    {
        $product = Product::where('prod_bar_code',$this->searchTerm)->first();
        Cart::add([
            'id' => $product->id,
            'name' => $product->prod_name,
            'price' => $product->prod_price,
            'quantity' => 1,
            'attributes' => [
                'dateOrder' => date('YmdHis'),
                'psod_item_unit' => $product->prod_unit,
                'psod_item_price' => $product->prod_price,
                'psod_item_discount' => $product->prod_discount,
                'psod_item_promotion' => 0,
                'psod_item_discount_total' => $product->prod_discount,
            ]
        ]);

        $cart = Cart::get($product->id);

        Cart::update($product->id,[
            'attributes' => [
                'dateOrder' => date('YmdHis'),
                'psod_item_unit' => $product->prod_unit,
                'psod_item_price' => $product->prod_price,
                'psod_item_discount' => $product->prod_discount,
                'psod_item_promotion' => $cart->attributes->psod_item_promotion,
                'psod_item_discount_total' => $product->prod_discount * $cart->quantity,
            ]
        ]);

        Helper::checkPromotion($product->id,date('Y-m-d'),$cart->quantity);

        // Cart::clear();

        $this->emit('posCartRefresh');
        $this->reset('searchTerm');
    }

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
