<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => $this->faker->imageUrl(),
            'title' => $this->faker->word,
            'date' => $this->faker->date(),
            'content' => $this->faker->word,

        ];
    }
}
