<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;

class SupplierFormPage extends Component
{
    public function render()
    {
        return view('livewire.supplier.supplier-form-page')->extends('layouts.main');
    }
}
