<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'test0',
            'email' => 'test0@example.com',
            'password' => bcrypt('password'),
            'xp' => 0,
            'rank' => 'Quiz Apprentice',
        ]);
    }
}
