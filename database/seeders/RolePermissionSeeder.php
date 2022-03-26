<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::where(['username' => 'admin'])->first();
        $admin->assignRole($adminRole->name);

        $employeeRole = Role::create(['name' => 'employee']);
        $employee = User::where(['username' => 'employee'])->first();
        $employee->assignRole($employeeRole->name);
        
        $customerRole = Role::create(['name' => 'customer']);
        $customer = User::where(['username' => 'customer'])->first();
        $customer->assignRole($customerRole->name);

        $posPermission = Permission::create(['name' => 'pos']);
        $importPermission = Permission::create(['name' => 'import']);

        $adminRole->givePermissionTo($posPermission->name);
        $adminRole->givePermissionTo($importPermission->name);

        $this->command->info('Role & Permission table seeded!');
    }
}
