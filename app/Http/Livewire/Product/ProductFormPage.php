<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class ProductFormPage extends Component
{
    use WithFileUploads;
    
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

    public function storeImage()
    {
        if(!$this->prod_picture){
            return null;
        }

        $img = ImageManagerStatic::make($this->prod_picture)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('product')->put($name,$img);
        return $name;
    }

    public function save()
    {
        $this->validate($this->rules(),$this->messages);

        $product = new Product();

        $product->category_id = $this->category_id;
        $product->prod_name = $this->prod_name;
        $product->prod_unit = $this->prod_unit;
        $product->prod_cost = $this->prod_cost;
        $product->prod_price = $this->prod_price;
        $product->prod_qty = $this->prod_qty;
        $product->prod_discount = $this->prod_discount;
        $product->prod_bar_code = $this->prod_bar_code;
        $product->prod_picture = $this->storeImage();
        $product->prod_status = $this->prod_status;

        $product->save();

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลสินค้าเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('product.list')
        ]);

    }

    public function render()
    {
        return view('livewire.product.product-form-page',[
                'categories' => Category::where('cate_status',1)->get()
            ])->extends('layouts.main');
    }
}
