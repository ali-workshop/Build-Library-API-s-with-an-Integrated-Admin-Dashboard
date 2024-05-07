<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $biography=$this->faker->randomElement(['dramaAuthor','MathAuthor']);
        return [
            'name'=>$this->faker->name(),
            'biography'=> $biography
        ];
    }
}
