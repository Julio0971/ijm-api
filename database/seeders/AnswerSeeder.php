<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Subject;
use App\Models\Question;

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {
        $subjects = Subject::all();
        $questions = Question::whereIn('name', ['Camino al trabajo', 'La cena'])->get();

        foreach ($subjects as $subject) {
            foreach ($questions as $question) {
                Answer::factory()->create([
                    'subject_id' => $subject->id,
                    'question_id' => $question->id
                ]);
            }
            
            Answer::factory()->create([
                'subject_id' => $subject->id,
                'question_id' => $subject->question->id
            ]);
        }
    }
}