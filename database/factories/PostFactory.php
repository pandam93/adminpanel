<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5, true);
        $slug = str_replace(' ', '-', $title);
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->text(),
            'summary' => $this->faker->text(175), // password
            'published' => $this->faker->numberBetween(0,1),
            'user_id' => $this->faker->numberBetween(1,50),
            'category_id' => $this->faker->numberBetween(1,3),
            'published_at' => Carbon::today()->subDays(rand(0, 365)),
            'created_at' => Carbon::today()->subDays(rand(0, 365)),
        ];
    }
}
