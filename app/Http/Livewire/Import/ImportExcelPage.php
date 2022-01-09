<?php

namespace App\Http\Livewire\Import;

use Excel;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportExcelPage extends Component
{
    use WithFileUploads;

    public $excel;

    public function importExcel()
    {
        Excel::import(new ProductImport,$this->excel->path());

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกรับสินค้าเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('import.list')
        ]);
    }

    public function render()
    {
        return view('livewire.import.import-excel-page')->extends('layouts.main');
    }
}
