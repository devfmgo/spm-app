<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@nurulfikri.com',
            'email_verified_at' => date('Y-m-d  H:i:s', time()),
            'password' => \bcrypt('password'),
            'is_admin' => true
        ]);
    }
}
