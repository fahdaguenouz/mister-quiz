<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'category_id' => 1, // Art
            'text' => 'Who painted the Mona Lisa?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'category_id' => 1,
            'text' => 'What art movement is Salvador Dalí associated with?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'category_id' => 2, // History
            'text' => 'In which year did the Titanic sink?',
            'xp_value' => 10,
        ]);

        Question::create([
            'category_id' => 2,
            'text' => 'Who was the first president of the United States?',
            'xp_value' => 10,
        ]);

        Question::create([
            'category_id' => 3, // Geography
            'text' => 'What is the capital of France?',
            'xp_value' => 10,
        ]);

        Question::create([
            'category_id' => 3,
            'text' => 'Which river is the longest in the world?',
            'xp_value' => 10,
        ]);

        Question::create([
            'category_id' => 4, // Science
            'text' => 'What is the chemical symbol for gold?',
            'xp_value' => 10,
        ]);

        Question::create([
            'category_id' => 4,
            'text' => 'What planet is known as the Red Planet?',
            'xp_value' => 10,
        ]);

        Question::create([
            'category_id' => 5, // Sports
            'text' => 'Which sport is known as "the beautiful game"?',
            'xp_value' => 10,
        ]);

        Question::create([
            'category_id' => 5,
            'text' => 'In which sport would you perform a slam dunk?',
            'xp_value' => 10,
        ]);
    }
}
