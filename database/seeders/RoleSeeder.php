<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Membuat role 'member' jika belum ada
        Role::firstOrCreate(['name' => 'member']);
    }
}
