<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Answers for the first question (Art: Who painted the Mona Lisa?)
        Answer::create(['question_id' => 1, 'answer_text' => 'Leonardo da Vinci', 'is_correct' => true]);
        Answer::create(['question_id' => 1, 'answer_text' => 'Vincent van Gogh', 'is_correct' => false]);
        Answer::create(['question_id' => 1, 'answer_text' => 'Pablo Picasso', 'is_correct' => false]);
        Answer::create(['question_id' => 1, 'answer_text' => 'Claude Monet', 'is_correct' => false]);

        // Answers for the second question (Art: What art movement is Salvador Dalí associated with?)
        Answer::create(['question_id' => 2, 'answer_text' => 'Surrealism', 'is_correct' => true]);
        Answer::create(['question_id' => 2, 'answer_text' => 'Impressionism', 'is_correct' => false]);
        Answer::create(['question_id' => 2, 'answer_text' => 'Cubism', 'is_correct' => false]);
        Answer::create(['question_id' => 2, 'answer_text' => 'Abstract', 'is_correct' => false]);

        // Answers for the third question (History: In which year did the Titanic sink?)
        Answer::create(['question_id' => 3, 'answer_text' => '1912', 'is_correct' => true]);
        Answer::create(['question_id' => 3, 'answer_text' => '1905', 'is_correct' => false]);
        Answer::create(['question_id' => 3, 'answer_text' => '1915', 'is_correct' => false]);
        Answer::create(['question_id' => 3, 'answer_text' => '1920', 'is_correct' => false]);

        // Answers for the fourth question (History: Who was the first president of the United States?)
        Answer::create(['question_id' => 4, 'answer_text' => 'George Washington', 'is_correct' => true]);
        Answer::create(['question_id' => 4, 'answer_text' => 'Thomas Jefferson', 'is_correct' => false]);
        Answer::create(['question_id' => 4, 'answer_text' => 'Abraham Lincoln', 'is_correct' => false]);
        Answer::create(['question_id' => 4, 'answer_text' => 'John Adams', 'is_correct' => false]);

        // Answers for the fifth question (Geography: What is the capital of France?)
        Answer::create(['question_id' => 5, 'answer_text' => 'Paris', 'is_correct' => true]);
        Answer::create(['question_id' => 5, 'answer_text' => 'London', 'is_correct' => false]);
        Answer::create(['question_id' => 5, 'answer_text' => 'Berlin', 'is_correct' => false]);
        Answer::create(['question_id' => 5, 'answer_text' => 'Madrid', 'is_correct' => false]);

        // Answers for the sixth question (Geography: Which river is the longest in the world?)
        Answer::create(['question_id' => 6, 'answer_text' => 'Nile', 'is_correct' => true]);
        Answer::create(['question_id' => 6, 'answer_text' => 'Amazon', 'is_correct' => false]);
        Answer::create(['question_id' => 6, 'answer_text' => 'Yangtze', 'is_correct' => false]);
        Answer::create(['question_id' => 6, 'answer_text' => 'Mississippi', 'is_correct' => false]);

        // Answers for the seventh question (Science: What is the chemical symbol for gold?)
        Answer::create(['question_id' => 7, 'answer_text' => 'Au', 'is_correct' => true]);
        Answer::create(['question_id' => 7, 'answer_text' => 'Ag', 'is_correct' => false]);
        Answer::create(['question_id' => 7, 'answer_text' => 'Fe', 'is_correct' => false]);
        Answer::create(['question_id' => 7, 'answer_text' => 'Pb', 'is_correct' => false]);

        // Answers for the eighth question (Science: What planet is known as the Red Planet?)
        Answer::create(['question_id' => 8, 'answer_text' => 'Mars', 'is_correct' => true]);
        Answer::create(['question_id' => 8, 'answer_text' => 'Venus', 'is_correct' => false]);
        Answer::create(['question_id' => 8, 'answer_text' => 'Jupiter', 'is_correct' => false]);
        Answer::create(['question_id' => 8, 'answer_text' => 'Saturn', 'is_correct' => false]);

        // Answers for the ninth question (Sports: Which sport is known as "the beautiful game"?)
        Answer::create(['question_id' => 9, 'answer_text' => 'Soccer', 'is_correct' => true]);
        Answer::create(['question_id' => 9, 'answer_text' => 'Basketball', 'is_correct' => false]);
        Answer::create(['question_id' => 9, 'answer_text' => 'Tennis', 'is_correct' => false]);
        Answer::create(['question_id' => 9, 'answer_text' => 'Cricket', 'is_correct' => false]);

        // Answers for the tenth question (Sports: In which sport would you perform a slam dunk?)
        Answer::create(['question_id' => 10, 'answer_text' => 'Basketball', 'is_correct' => true]);
        Answer::create(['question_id' => 10, 'answer_text' => 'Football', 'is_correct' => false]);
        Answer::create(['question_id' => 10, 'answer_text' => 'Baseball', 'is_correct' => false]);
        Answer::create(['question_id' => 10, 'answer_text' => 'Hockey', 'is_correct' => false]);

        Answer::create([ 'question_id' => 11, 'answer_text' => 'Paris', 'is_correct' => true]);
        Answer::create(['question_id' => 11, 'answer_text' => 'London', 'is_correct' => false]);
        Answer::create(['question_id' => 11, 'answer_text' => 'Berlin', 'is_correct' => false]);
        Answer::create([ 'question_id' => 11, 'answer_text' => 'Madrid', 'is_correct' => false]);

        Answer::create([ 'question_id' => 12, 'answer_text' => 'Pacific Ocean', 'is_correct' => true]);
        Answer::create(['question_id' => 12, 'answer_text' => 'Atlantic Ocean', 'is_correct' => false]);
        Answer::create([ 'question_id' => 12, 'answer_text' => 'Indian Ocean', 'is_correct' => false]);
        Answer::create([ 'question_id' => 12, 'answer_text' => 'Arctic Ocean', 'is_correct' => false]);

        Answer::create([ 'question_id' => 13, 'answer_text' => '100°C', 'is_correct' => true]);
        Answer::create(['question_id' => 13, 'answer_text' => '90°C', 'is_correct' => false]);
        Answer::create([ 'question_id' => 13, 'answer_text' => '80°C', 'is_correct' => false]);
        Answer::create([ 'question_id' => 13, 'answer_text' => '110°C', 'is_correct' => false]);

        Answer::create([ 'question_id' => 14, 'answer_text' => 'Harper Lee', 'is_correct' => true]);
        Answer::create(['question_id' => 14, 'answer_text' => 'J.K. Rowling', 'is_correct' => false]);
        Answer::create([ 'question_id' => 14, 'answer_text' => 'Ernest Hemingway', 'is_correct' => false]);
        Answer::create(['question_id' => 14, 'answer_text' => 'F. Scott Fitzgerald', 'is_correct' => false]);

        Answer::create(['question_id' => 15, 'answer_text' => 'Au', 'is_correct' => true]);
        Answer::create(['question_id' => 15, 'answer_text' => 'Ag', 'is_correct' => false]);
        Answer::create([ 'question_id' => 15, 'answer_text' => 'Fe', 'is_correct' => false]);
        Answer::create([ 'question_id' => 15, 'answer_text' => 'Pb', 'is_correct' => false]);

        Answer::create([ 'question_id' => 16, 'answer_text' => 'Mars', 'is_correct' => true]);
        Answer::create(['question_id' => 16, 'answer_text' => 'Venus', 'is_correct' => false]);
        Answer::create([ 'question_id' => 16, 'answer_text' => 'Jupiter', 'is_correct' => false]);
        Answer::create(['question_id' => 16, 'answer_text' => 'Saturn', 'is_correct' => false]);

        Answer::create([ 'question_id' => 17, 'answer_text' => 'Basketball', 'is_correct' => true]);
        Answer::create([ 'question_id' => 17, 'answer_text' => 'Football', 'is_correct' => false]);
        Answer::create([ 'question_id' => 17, 'answer_text' => 'Baseball', 'is_correct' => false]);
        Answer::create(['question_id' => 17, 'answer_text' => 'Hockey', 'is_correct' => false]);

        Answer::create(['question_id' => 18, 'answer_text' => 'Diamond', 'is_correct' => true]);
        Answer::create([ 'question_id' => 18, 'answer_text' => 'Graphite', 'is_correct' => false]);
        Answer::create([ 'question_id' => 18, 'answer_text' => 'Quartz', 'is_correct' => false]);
        Answer::create([ 'question_id' => 18, 'answer_text' => 'Emerald', 'is_correct' => false]);

        Answer::create(['question_id' => 19, 'answer_text' => 'Mount Everest', 'is_correct' => true]);
        Answer::create(['question_id' => 19, 'answer_text' => 'K2', 'is_correct' => false]);
        Answer::create([ 'question_id' => 19, 'answer_text' => 'Kangchenjunga', 'is_correct' => false]);
        Answer::create([ 'question_id' => 19, 'answer_text' => 'Lhotse', 'is_correct' => false]);

        Answer::create([ 'question_id' => 20, 'answer_text' => 'J.K. Rowling', 'is_correct' => true]);
        Answer::create([ 'question_id' => 20, 'answer_text' => 'Stephen King', 'is_correct' => false]);
        Answer::create([ 'question_id' => 20, 'answer_text' => 'George R.R. Martin', 'is_correct' => false]);
        Answer::create(['question_id' => 20, 'answer_text' => 'Agatha Christie', 'is_correct' => false]);
    }
}
