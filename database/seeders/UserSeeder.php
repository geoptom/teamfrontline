<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate(); // now safe

        // Re-enable FK checks
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Admin user
        User::create([
            'name'     => 'Admin User',
            'username' => 'admin',
            'email'    => 'admin@teamfrontline.com',
            'phone'    => '+91 99999 99999',
            'role'     => 'admin',
            'status'   => 'active',
            'password' => Hash::make('password123'),
        ]);

        // Vendor user
        User::create([
            'name'     => 'Vendor One',
            'username' => 'vendor1',
            'email'    => 'vendor1@teamfrontline.com',
            'phone'    => '+91 88888 88888',
            'role'     => 'vendor',
            'status'   => 'active',
            'password' => Hash::make('password123'),
        ]);

        // Regular user
        User::create([
            'name'     => 'John Doe',
            'username' => 'johndoe',
            'email'    => 'john@teamfrontline.com',
            'phone'    => '+91 77777 77777',
            'role'     => 'user',
            'status'   => 'active',
            'password' => Hash::make('password123'),
        ]);}
}
