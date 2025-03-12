<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_Quiz extends Model
{
    protected $table = 'question_quiz';
    protected $fillable = ['question_id', 'quizzes_id'];


    use HasFactory;
}
