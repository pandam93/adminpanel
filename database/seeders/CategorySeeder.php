<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Cine',
                'slug' => 'cine',
                'user_id' => rand(1, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'musica',
                'slug' => 'musica',
                'user_id' => rand(1, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'series',
                'slug' => 'series',
                'user_id' => rand(1, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
