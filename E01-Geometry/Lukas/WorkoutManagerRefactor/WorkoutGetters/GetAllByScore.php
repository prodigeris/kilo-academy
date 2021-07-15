<?php


namespace App\Services;

use App\Client;
use App\Workout;

class GetAllByScore extends WorkoutManager
{

    /**
     * @param int $score
     * @return int|null
     */
    public function getWorkoutIdByScore(int $score): ?int
    {
        $level = $this->getLastStep($score);
        return array_rand($this->levels[$level]);
    }

    /**
     * @param int $score
     * @return Workout|null
     */
    public function getWorkoutByScore(int $score): ?Workout
    {
        $id = $this->getWorkoutIdByScore($score);
        if (!$id) {
            return null;
        }

        return Workout::find($id);
    }
}
