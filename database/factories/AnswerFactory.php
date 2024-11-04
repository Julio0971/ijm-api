<?php

namespace Database\Factories;

use App\Models\Answer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition () {
        $seconds = fake()->randomNumber(2, false);

        return [
            'answer' => fake()->randomElement(['Sí', 'No']),
            'seconds' => $seconds,
            'in_time' => $seconds < 20 ? fake()->boolean() : 0,
        ];
    }
}
