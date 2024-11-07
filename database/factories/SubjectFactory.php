<?php

namespace Database\Factories;

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
        $next_subject_id = Subject::count() + 1;

        if (($next_subject_id - 1) % 3 == 0) {
            $question_name = 'Variante 1 (hombre)';
        } else if (($next_subject_id - 2) % 3 == 0) {
            $question_name = 'Variante 2 (mujer)';
        } else if (($next_subject_id - 3) % 3 == 0) {
            $question_name = 'Variante 3 (neutro)';
        }

        $question_id = Question::where('name', $question_name)->value('id');

        return [
            'gender' => fake()->randomElement(['Hombre', 'Mujer']),
            'age' => fake()->randomNumber(2, false),
            'speciality' => fake()->sentence(3),
            'grade' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'participated_before' => fake()->boolean(),
            'question_id' => $question_id
        ];
    }
}