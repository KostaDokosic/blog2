<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->realText(500),
            'user_id' => User::where('email', 'admin@gmail.com')->get()[0]->id,
            'post_id' => 1
        ];
    }
}
