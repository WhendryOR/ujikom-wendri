<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions
        $permissions = [
            'dashboard',
            'transaction-order',
            'history-order',
            'masterdata-konsumen',
            'masterdata-petugas',
            'masterdata-layanan',
            'masterdata-pembayaran',
            'masterdata-pemimpin'
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $roles = [
            'Admin' => ['dashboard', 'transaction-order', 'history-order', 'masterdata-konsumen', 'masterdata-petugas', 'masterdata-layanan', 'masterdata-pembayaran', 'masterdata-pemimpin'],
            'Petugas' => ['dashboard', 'transaction-order', 'history-order', 'masterdata-konsumen'],
            'Pemimpin' => ['dashboard', 'history-order'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($rolePermissions);
        }

        // Create an admin user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456)
        ]);
        
        // Assign the Admin role to the user
        $adminRole = Role::where('name', 'Admin')->first();
        $user->assignRole($adminRole);

        $user1 = User::create([
            'name' => 'Pemimpin',
            'email' => 'pemimpin@gmail.com',
            'password' => Hash::make(123456)
        ]);
        
        // Assign the Admin role to the user
        $pemimpinRole = Role::where('name', 'Pemimpin')->first();
        $user1->assignRole($pemimpinRole);
    }
}

