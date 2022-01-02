<?php

namespace App\Http\Livewire\Import;

use App\Models\Product;
use Livewire\Component;
use App\Models\Supplier;

class ImportFormPage extends Component
{
    public $idKey=0;
    public $supplier_id;
    public $impo_total=0;
    public $impo_process=2;
    public $impo_qty=0;
    public $created_by;
    public $updated_by;

    public $inputs = [];
    public $i = 1;

    public $checkProduct=[];

    protected $listeners = [
        'selectedProduct' => 'selectedProduct'
    ];

    public function selectedProduct($id)
    {
        $product = Product::findOrFail($id);

        if(!empty($this->checkProduct) && in_array($product->id,$this->checkProduct)){
            return;
        }

        $this->inputs[] = [
            'product_id' => $product->id,
            'ipi_name' => $product->prod_name,
            'ipi_qty' => 1,
            'ipi_unit' => $product->prod_unit,
            'ipi_price' => $product->prod_cost,
            'ipi_total' => $product->prod_cost
        ];

        array_push($this->checkProduct,$product->id);
    }

    public function render()
    {
        return view('livewire.import.import-form-page',[
            'suppliers' => Supplier::where('sup_status',1)->orderBy('sup_name','asc')->get()
        ])->extends('layouts.main');
    }
}
