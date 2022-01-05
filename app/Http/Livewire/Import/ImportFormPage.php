<?php

namespace App\Http\Livewire\Import;

use App\Models\Import;
use App\Models\Product;
use Livewire\Component;
use App\Models\Supplier;
use App\Models\ImportProductItem;
use Illuminate\Support\Facades\DB;

class ImportFormPage extends Component
{
    public $idKey=0;
    public $supplier_id;
    public $impo_total=0;
    public $impo_process=2;
    public $impo_qty=0;
    public $created_by;
    public $updated_by;

    public $total = 0;

    public $inputs = [];
    public $i = 1;

    public $checkProduct=[];

    protected $listeners = [
        'selectedProduct' => 'selectedProduct'
    ];

    protected $rules = [
        'supplier_id' => 'required',
        'impo_process' => 'required'
    ];

    protected $messages = [
        'supplier_id.required' => 'กรุณาเลือกผู้ผลิต',
        'impo_process.required' => 'กรุณาเลือกสถานะ'
    ];

    public function save()
    {
        $this->validate($this->rules,$this->messages);

        try {
            DB::beginTransaction();
            $import = Import::updateOrCreate([
                'id' => $this->idKey
            ],[
                'supplier_id' => $this->supplier_id,
                'impo_total' => 0,
                'impo_process' => $this->impo_process,
                'impo_qty' => 0,
                'created_by' => 1,
                'updated_by' => 1
            ]);

            $total = 0;
            $qty = 0;

            DB::table('import_product_items')->where('import_id',$import->id)->delete();
            foreach($this->inputs as $value){
                $item = ImportProductItem::create([
                    'import_id' => $import->id,
                    'product_id' => $value['product_id'],
                    'ipi_name' => $value['ipi_name'],
                    'ipi_qty' => $value['ipi_qty'],
                    'ipi_unit' => $value['ipi_unit'],
                    'ipi_price' => $value['ipi_price'],
                    'ipi_total' => $value['ipi_total'],
                ]);

                $total += $value['ipi_total'];
                $qty += $value['ipi_qty'];
            }

            $import->impo_total = $total;
            $import->impo_qty = $qty;
            $import->save();

            DB::commit();

            $this->dispatchBrowserEvent('swal',[
                'title' => 'บันทึกรับสินค้าเรียบร้อย',
                'timer' => 3000,
                'icon' => 'success',
                'url' => route('import.list')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
        
    }

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
        $this->sumTotal();
    }

    public function sumRow($index){
        $this->inputs[$index]['ipi_total'] = $this->inputs[$index]['ipi_qty'] * $this->inputs[$index]['ipi_price'];
        $this->sumTotal();
    }

    public function sumTotal()
    {
        $this->total = 0;
        foreach($this->inputs as $value){
            $this->total += $value['ipi_total'];
        }
    }

    public function deleteRow($index){
        unset($this->inputs[$index]);
        unset($this->checkProduct[$index]);

        $this->sumTotal();

        array_values($this->inputs);
        array_values($this->checkProduct);

    }

    public function mount($id = 0){
        if($id){
            $import = Import::findOrFail($id);
            $this->idKey = $import->id;
            $this->supplier_id = $import->supplier_id;
            $this->impo_total = $import->impo_total;
            $this->impo_process = $import->impo_process;
            $this->impo_qty = $import->impo_qty;
            $this->created_by = $import->created_by;
            $this->updated_by = $import->updated_by;
            $this->total = $import->impo_total;

            foreach ($import->items as $key => $value) {
                $this->inputs[] = [
                    'product_id' => $value->product_id,
                    'ipi_name' => $value->ipi_name,
                    'ipi_qty' => $value->ipi_qty,
                    'ipi_unit' => $value->ipi_unit,
                    'ipi_price' => $value->ipi_price,
                    'ipi_total' => $value->ipi_total
                ];
            }
        }
    }

    public function render()
    {
        return view('livewire.import.import-form-page',[
            'suppliers' => Supplier::where('sup_status',1)->orderBy('sup_name','asc')->get()
        ])->extends('layouts.main');
    }
}
