<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->words(rand(5,10),true),
            'description'=>$this->faker->text(15),
            'image'=>$this->faker->text(8),
            'user_id'=>$this->faker->randomDigitNotNull
        ];
    }
}
