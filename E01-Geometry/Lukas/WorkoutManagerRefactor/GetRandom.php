<?php


namespace App\Services;

use App\Workout;
use RuntimeException;

class GetRandom implements Random
{

    /**
     * @return Workout
     */
    public function getWorkout(): Workout
    {
        $workout = Workout::where('is_visible', true)->inRandomOrder()->first();
        if (!$workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }
}

