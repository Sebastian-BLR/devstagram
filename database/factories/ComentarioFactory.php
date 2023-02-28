<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id'    => random_int(1,104),
            'user_id'    => $this -> faker -> randomElement([1,2]),
            'comentario' => $this -> faker -> sentence(20)
            //
        ];
    }
}
