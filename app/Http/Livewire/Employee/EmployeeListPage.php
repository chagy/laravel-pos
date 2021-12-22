<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeListPage extends Component
{
    use WithPagination;

    public $searchTerm;
    
    public function render()
    {
        $employees = User::where('type',1);

        if($this->searchTerm){
            $employees = $employees
                            ->where('name','LIKE',"%{$this->searchTerm}%")
                            ->orWhere('phone','LIKE',"%{$this->searchTerm}%");
        }

        $employees = $employees
                        ->paginate(15);

        return view('livewire.employee.employee-list-page',[
            'employees' => $employees
        ])->extends('layouts.main');
    }
}
