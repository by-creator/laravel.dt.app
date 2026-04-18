<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::firstOrCreate(
            ['name' => 'ADMIN'],
            ['label' => 'Administrateur']
        );

        $admin = User::firstOrCreate(
            ['email' => 'admin@dakar-terminal.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('passer1234'),
            ]
        );

        if (! $admin->roles()->where('role_id', $role->id)->exists()) {
            $admin->roles()->attach($role);
        }
    }
}
