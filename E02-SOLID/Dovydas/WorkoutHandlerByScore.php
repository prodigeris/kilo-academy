<?php

declare(strict_types=1);

namespace App\Services;

use App\Client;

class WorkoutHandlerByScore
{
    public function getRandomWorkoutByScore(int $score): Workout
    {
        $workouts = new WorkoutFactory();
        if (Client::BEGINNER_RANGE[0] <= $score && $score <= Client::BEGINNER_RANGE[1]) {
            return  $workouts->createBeginnerWorkout()->getRandom();
        }

        if (Client::INTERMEDIATE_RANGE[0] <= $score && $score <= Client::INTERMEDIATE_RANGE[1]) {
            return $workouts->createIntermediateWorkout()->getRandom();
        }

        if (Client::ADVANCED_RANGE[0] <= $score && $score <= Client::ADVANCED_RANGE[1]) {
            return $workouts->createAdvancedWorkout()->getRandom();
        }

        if (Client::PRO_RANGE[0] <= $score && $score <= Client::PRO_RANGE[1]) {
            return $workouts->createProWorkout()->getRandom();
        }

        return $workouts->createWalkerWorkout()->getRandom();
    }
}
