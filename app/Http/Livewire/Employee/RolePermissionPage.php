<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionPage extends Component
{
    public $role;
    public $employee;

    public function mount($id)
    {
        $employee = User::findOrFail($id);
        if($employee){
            $this->role = !empty($employee->getRoleNames()[0]) ? $employee->getRoleNames()[0] : '';
            $this->employee = $employee;
        }
    }

    public function save()
    {
        
        $role = Role::where('name',$this->role)->first();
        
        $this->employee->syncRoles($role->name);

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลระดับและสิทธิ์เรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            // 'url' => route('employee.list')
        ]);
    }

    public function render()
    {
        return view('livewire.employee.role-permission-page',[
            'roles' => Role::all(),
            'permissions' => Permission::all() 
        ])->extends('layouts.main');;
    }
}
