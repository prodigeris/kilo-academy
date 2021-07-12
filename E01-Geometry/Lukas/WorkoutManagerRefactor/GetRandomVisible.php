<?php


namespace App\Services;

use App\Workout;
use RuntimeException;

class GetRandomVisible implements Random
{

    /**
     * @return Workout
     */
    public function getWorkout(): Workout
    {
        $workout = Workout::inRandomOrder()->first();
        if (!$workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }
}
