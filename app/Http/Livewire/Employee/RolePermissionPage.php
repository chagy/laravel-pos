<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionPage extends Component
{
    public $role;
    
    public function render()
    {
        return view('livewire.employee.role-permission-page',[
            'roles' => Role::all(),
            'permissions' => Permission::all() 
        ])->extends('layouts.main');;
    }
}
