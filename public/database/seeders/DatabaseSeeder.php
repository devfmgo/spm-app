<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UnitTableSeeder::class]);
        $this->call([TypeTableSeeder::class]);
        $this->call([AdminUserTableSeeder::class]);
    }
}
