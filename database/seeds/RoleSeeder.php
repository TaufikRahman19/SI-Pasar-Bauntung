<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'redirect_to' => '/dashboard',
            ],
            [
                'name' => 'pedagang',
                'redirect_to' => '/penjualan/daftar_penjualan',
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
