<?php


namespace App\Services;

use App\Client;
use App\Workout;

class GetAllByScore extends WorkoutManager
{

    /**
     * @param int $score
     * @return Workout|null
     */
    public function getWorkoutByScore(int $score): ?Workout
    {
        $id = GetIdByScore::class->getWorkoutIdByScore($score);
        if (!$id) {
            return null;
        }

        return Workout::find($id);
    }
}
