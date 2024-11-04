<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Subject;
use App\Models\Question;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition () {
        return [
            'gender' => fake()->randomElement(['Hombre', 'Mujer']),
            'age' => fake()->randomNumber(2, false),
            'speciality' => fake()->sentence(3),
            'grade' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'participated_before' => fake()->boolean(),
            'user_id' => User::where('username', 'participante')->value('id'),
            'question_id' => Question::whereNotIn('name', ['Camino al trabajo', 'La cena'])->inRandomOrder()->value('id')
        ];
    }
}