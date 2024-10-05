<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'xp',
        'rank'
    ];
    public function getRankAttribute()
    {
        if ($this->xp < 1500) {
            return 'Quiz Apprentice';
        } elseif ($this->xp >= 1500 && $this->xp < 5000) {
            return 'Average Quizer';
        } elseif ($this->xp >= 5000 && $this->xp < 10000) {
            return 'Epic Quizer';
        } else {
            return 'Quiz Master';
        }
    }
    public function leaderboard()
{
    $topPlayers = User::orderBy('xp', 'desc')->take(10)->get();

    return view('leaderboard', ['players' => $topPlayers]);
}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function categoryScores()
    {
        return $this->hasMany(CategoryScore::class);
    }
}
