<?php

namespace Database\Seeders;

use App\Models\Subject;

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {
        for ($i = 0; $i < 50; $i++) { 
            Subject::factory()->create();
        }
    }
}