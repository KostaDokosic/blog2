<?php

namespace Database\Factories;

use App\Models\User;
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
            'title' => $this->faker->sentence(),
            'body' => $this->faker->realText(5000),
            'image_url' => $this->faker->imageUrl(),
            'user_id' => User::factory(1)->create()[0]
        ];
    }
}
