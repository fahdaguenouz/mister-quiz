<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_questions', 'correct_answers'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizDetails()
    {
        return $this->hasMany(QuizDetail::class);
    }
}
