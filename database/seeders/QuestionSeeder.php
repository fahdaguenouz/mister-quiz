<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Step 1: Truncate the answers table first
        DB::table('answers')->truncate();   // This will delete all rows in the answers table
        
        // Step 2: Now truncate the questions table
        DB::table('questions')->truncate(); 
        Question::create([
            'category_id' => 1, // Art
            'text' => 'Who painted the Mona Lisa?',
            'xp_value' => 105,
        ]);
        
        Question::create([
            'category_id' => 1,
            'text' => 'What art movement is Salvador Dalí associated with?',
            'xp_value' => 1000,
        ]);
        
        Question::create([
            'category_id' => 2, // History
            'text' => 'In which year did the Titanic sink?',
            'xp_value' => 106,
        ]);

        Question::create([
            'category_id' => 2,
            'text' => 'Who was the first president of the United States?',
            'xp_value' => 140,
        ]);

        Question::create([
            'category_id' => 3, // Geography
            'text' => 'What is the capital of France?',
            'xp_value' => 11,
        ]);

        Question::create([
            'category_id' => 3,
            'text' => 'Which river is the longest in the world?',
            'xp_value' => 15,
        ]);

        Question::create([
            'category_id' => 4, // Science
            'text' => 'What is the chemical symbol for gold?',
            'xp_value' => 4,
        ]);

        Question::create([
            'category_id' => 4,
            'text' => 'What planet is known as the Red Planet?',
            'xp_value' => 50,
        ]);

        Question::create([
            'category_id' => 5, // Sports
            'text' => 'Which sport is known as "the beautiful game"?',
            'xp_value' => 15,
        ]);

        Question::create([
            'category_id' => 5,
            'text' => 'In which sport would you perform a slam dunk?',
            'xp_value' => 60,
        ]);
        Question::create([
            'id' => 11,
            'category_id' => 1,
            'text' => 'What is the capital of France?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'id' => 12,
            'category_id' => 1,
            'text' => 'What is the largest ocean on Earth?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'id' => 13,
            'category_id' => 2,
            'text' => 'What is the boiling point of water?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'id' => 14,
            'category_id' => 3,
            'text' => 'Who wrote "To Kill a Mockingbird"?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'id' => 15,
            'category_id' => 4,
            'text' => 'What is the chemical symbol for gold?',
            'xp_value' => 50,
        ]);

        Question::create([
            'id' => 16,
            'category_id' => 4,
            'text' => 'Which planet is known as the Red Planet?',
            'xp_value' => 215,
        ]);

        Question::create([
            'id' => 17,
            'category_id' => 5,
            'text' => 'In which sport would you perform a slam dunk?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'id' => 18,
            'category_id' => 2,
            'text' => 'What is the hardest natural substance on Earth?',
            'xp_value' => 10,
        ]);
        
        Question::create([
            'id' => 19,
            'category_id' => 1,
            'text' => 'What is the tallest mountain in the world?',
            'xp_value' => 100,
        ]);
        
        Question::create([
            'id' => 20,
            'category_id' => 3,
            'text' => 'What is the name of the author of the Harry Potter series?',
            'xp_value' => 1320,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
