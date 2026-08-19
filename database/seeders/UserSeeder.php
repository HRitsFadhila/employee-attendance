<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'employee']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678')
            ]
        );
        $admin->assignRole('admin');

        $employee = User::firstOrCreate(
            ['email' => 'm.harits.fadhila@gmail.com'],
            [
                'name' => 'Harits Fadhila',
                'password' => Hash::make('12345678')
            ]
        );
        $employee->assignRole('employee');
    }
}
