<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUserScores($xp, $results)
    {
        // Update XP
        $user = Auth::user();
        $user->xp += $xp; // Update experience points
        $user->save(); // Save the user instance

        // Update category scores
        foreach ($results as $key => $value) {
            if ($key !== 'overall') {
                [$correct, $total] = explode("/", $user[$key]);
                $user[$key] = ($correct + $value) . "/" . ($total + 4); // Update the score
            }
        }

        $user->save(); // Save the updated scores
    }
}
