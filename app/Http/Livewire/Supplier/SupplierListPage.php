<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;

class SupplierListPage extends Component
{
    use WithPagination;
    
    public $searchTerm;

    public function render()
    {
        $suppliers = Supplier::query();

        if($this->searchTerm){
            $suppliers = $suppliers
                            ->where('sup_name','LIKE',"%{$this->searchTerm}")
                            ->orWhere('sup_contact_name','LIKE',"%{$this->searchTerm}")
                            ->orWhere('sup_contact_phone','LIKE',"%{$this->searchTerm}");
        }

        $suppliers = $suppliers->paginate(15);

        return view('livewire.supplier.supplier-list-page',[
            'suppliers' => $suppliers
        ])->extends('layouts.main');
    }
}
