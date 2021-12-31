<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category;

class ProductFormPage extends Component
{
    public $idKey = 0;
    public $category_id;
    public $prod_name;
    public $prod_unit;
    public $prod_cost;
    public $prod_price;
    public $prod_qty = 0;
    public $prod_discount;
    public $prod_bar_code;
    public $prod_picture;
    public $prod_status = 1;

    public function rules()
    {
        if($this->idKey){
            return [
                'category_id' => 'required',
                'prod_name' => 'required|unique:products,prod_name,'.$this->idKey,
                'prod_unit' => 'required',
                'prod_cost' => 'required|numeric',
                'prod_price' => 'required|numeric',
                'prod_qty' => 'required|integer',
            ];
        }else{
            return [
                'category_id' => 'required',
                'prod_name' => 'required|unique:products',
                'prod_unit' => 'required',
                'prod_cost' => 'required|numeric',
                'prod_price' => 'required|numeric',
                'prod_qty' => 'required|integer',
            ];
        }
    }

    protected $messages = [
        'category_id.required' => 'กรุณาเลือกประเภท',
        'prod_name.required' => 'กรุณากรอกชื่อสินค้า',
        'prod_unit.required' => 'กรุณากรอกหน่วย',
        'prod_cost.required' => 'กรุณากรอกต้นทุน',
        'prod_cost.numeric' => 'กรุณากรอกเป็นตัวเลขเท่านั้น',
        'prod_price.required' => 'กรุณากรอกราคา',
        'prod_price.numeric' => 'กรุณากรอกเป็นตัวเลขเท่านั้น',
        'prod_qty.required' => 'กรุณากรอกจำนวน',
        'prod_qty.integer' => 'กรุณากรอกเป็นตัวเลขเท่านั้น',
    ];

    public function save()
    {
        $this->validate($this->rules(),$this->messages);
    }

    public function render()
    {
        return view('livewire.product.product-form-page',[
                'categories' => Category::where('cate_status',1)->get()
            ])->extends('layouts.main');
    }
}
