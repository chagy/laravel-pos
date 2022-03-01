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

    public $prod_discount = 0;
    public $idKey = 0;

    protected $listeners = [
        "productDiscountRefresh" => '$refresh'
    ];

    public function editDiscount($id)
    {
        $product = Product::findOrFail($id);
        $this->prod_discount = $product->prod_discount;
        $this->idKey = $product->id;
    }

    public function saveDiscount()
    {
        $product = Product::findOrFail($this->idKey);
        $product->prod_discount = $this->prod_discount;
        $product->save();

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลส่วนลดเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
        ]);

        $this->reset('prod_discount');
        $this->reset('idKey');

        $this->emit('$refresh');
    }

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
