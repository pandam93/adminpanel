<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::factory(20)->create();

        \App\Models\Post::factory(5)
                    ->state(new Sequence(
            function($sequence) { // secuence contains $index or $count
                return ['parent_id' => Post::all()->random()];
             } // Tambien se puede usar: rand(1, 20) pero la diferencia es obvia.
        ))->create();
    }
}
