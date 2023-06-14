<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions transaction
        Permission::create(['name' => 'view transaksi']);
        Permission::create(['name' => 'create transaksi']);
        Permission::create(['name' => 'edit transaksi']);
        Permission::create(['name' => 'delete transaksi']);
        Permission::create(['name' => 'check transaksi']);
        Permission::create(['name' => 'approve transaksi']);

        // create permissions management
        Permission::create(['name' => 'view management']);
        Permission::create(['name' => 'create management']);
        // create permissions users
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        // create permissions jabatan
        Permission::create(['name' => 'view jabatan']);
        Permission::create(['name' => 'create jabatan']);
        // create permissions hak akses
        Permission::create(['name' => 'create hak akses']);
        Permission::create(['name' => 'view hak akses']);
        // create permissions material
        Permission::create(['name' => 'view material']);
        Permission::create(['name' => 'edit material']);
        Permission::create(['name' => 'delete material']);
        Permission::create(['name' => 'create material']);
        // create permissions report
        Permission::create(['name' => 'view report']);
        Permission::create(['name' => 'edit report']);
        Permission::create(['name' => 'delete report']);
        Permission::create(['name' => 'create report']);

        //create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view transaksi');
        $adminRole->givePermissionTo('create transaksi');
        $adminRole->givePermissionTo('edit transaksi');
        $adminRole->givePermissionTo('delete transaksi');

        //create roles and assign existing permissions
        $managerRole = Role::create(['name' => 'manager']);
        $managerRole->givePermissionTo('view transaksi');

        //create roles and assign existing permissions
        $picRole = Role::create(['name' => 'pic']);
        $picRole->givePermissionTo('view transaksi');
        $picRole->givePermissionTo('create transaksi');
        $picRole->givePermissionTo('delete transaksi');

        $superadminRole = Role::create(['name' => 'super-admin']);

        // create demo users
        $user = User::factory()->create([
            'name' => 'admin',
            'username' => 'admingudang',
            'password' => Hash::make('123123123'),
        ]);

        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'pic name',
            'username' => 'picusername',
            'password' => Hash::make('123123123'),
        ]);

        $user->assignRole($picRole);

        $user = User::factory()->create([
            'name' => 'manager',
            'username' => 'managerusername',
            'password' => Hash::make('123123123'),
        ]);
        $user->assignRole($managerRole);

        $user = User::factory()->create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'password' => Hash::make('123123123'),
        ]);
        $user->assignRole($superadminRole);
        $user->givePermissionTo('view management');
        $user->givePermissionTo('create management');
        $user->givePermissionTo('view users');
        $user->givePermissionTo('create users');
        $user->givePermissionTo('edit users');
        $user->givePermissionTo('delete users');
    }
}