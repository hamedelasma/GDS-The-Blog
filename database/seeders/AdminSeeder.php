<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'password' => '12345678',
            'email' => 'admin@blog.com'
        ]);
        Admin::create([
            'name' => 'Admin Two',
            'password' => '12345678',
            'email' => 'test@blog.com'
        ]);
    }
}
