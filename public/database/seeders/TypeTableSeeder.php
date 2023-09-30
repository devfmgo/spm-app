<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Pedoman', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['name' => 'Panduan', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['name' => 'Prosedur', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['name' => 'IK', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['name' => 'Format', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())]
        ];
        Type::insert($types);
    }
}
