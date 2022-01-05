<?php

namespace App\Http\Livewire\Import;

use App\Models\Import;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ImportListPage extends Component
{
    use WithPagination;
    
    public $searchTerm;

    public function saveQty($id)
    {
        $import = Import::findOrFail($id);
        if($import->impo_process == 2){
            try {
                DB::beginTransaction();
                foreach ($import->items as $key => $value) {
                    $product = Product::findOrFail($value->product->id);
                    $product->prod_qty += $value->ipi_qty;
                    $product->save();
                }
                DB::commit();

                $this->dispatchBrowserEvent('swal',[
                    'title' => 'บันทึกรับสินค้าเรียบร้อย',
                    'timer' => 3000,
                    'icon' => 'success',
                ]);

                $import->impo_process = 1;
                $import->save();

                $this->render();
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
            

        }
    }

    public function render()
    {
        $imports = Import::select("imports.*")->join('suppliers','imports.supplier_id','=','suppliers.id');

        if($this->searchTerm)
        {
            $imports = $imports 
                            ->where('suppliers.sup_name','LIKE',"{$this->searchTerm}")
                            ->orWhere('suppliers.sup_contact_name','LIKE',"{$this->searchTerm}");
        }

        $imports = $imports->paginate(15);

        return view('livewire.import.import-list-page',[
            'imports' => $imports
        ])->extends('layouts.main');
    }
}
