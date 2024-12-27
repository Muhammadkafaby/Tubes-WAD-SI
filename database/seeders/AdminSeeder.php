<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Cek apakah role 'admin' sudah ada, jika belum buat
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

         // Cek apakah user admin sudah ada, jika belum buat
        $adminUser = User::firstOrCreate(
             ['email' => 'admin@gmail.com'], // Ganti dengan email admin yang diinginkan
            [
                'name' => 'Admin',
                 'password' => bcrypt('password'), // Ganti dengan password yang diinginkan
            ]
        );

         // Assign role admin ke user tersebut
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole($adminRole);
        }

         // Tampilkan informasi
        $this->command->info('Admin user created with email: admin@example.com and password: password');
    }
}
