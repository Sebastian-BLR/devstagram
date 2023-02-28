<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'      => $this -> faker -> sentence(5),
            'descripcion' => $this -> faker -> sentence(20),
            'imagen'      => $this -> faker -> randomElement(['1b17f5a3-9dce-433a-8a5e-110d3cc3b327.png',
                                                              '2b1708c2-38fd-4895-8596-899c404f2d82.jpg',
                                                              '6bd63292-999a-4243-8f97-26bc9a1338b2.jpg',
                                                              '8c04923c-cca7-4872-9233-f5f3820ea1bd.jpg',
                                                              'b98881bd-91db-40ff-8791-44091046317b.jpg']),
            'user_id'     => $this -> faker -> randomElement([1,2])
        ];
    }
}
