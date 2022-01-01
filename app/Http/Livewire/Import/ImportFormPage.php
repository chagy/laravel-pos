<?php

namespace App\Http\Livewire\Import;

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

    public function render()
    {
        return view('livewire.import.import-form-page',[
            'suppliers' => Supplier::where('sup_status',1)->orderBy('sup_name','asc')->get()
        ])->extends('layouts.main');
    }
}
