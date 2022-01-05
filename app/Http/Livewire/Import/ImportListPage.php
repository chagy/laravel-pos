<?php

namespace App\Http\Livewire\Import;

use App\Models\Import;
use Livewire\Component;
use Livewire\WithPagination;

class ImportListPage extends Component
{
    use WithPagination;
    
    public $searchTerm;

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
