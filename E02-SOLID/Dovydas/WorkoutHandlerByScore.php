<?php

declare(strict_types=1);

namespace App\Services;

use App\Client;
use App\WorkoutPlan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

/**
 * Class TipManager
 *
 * @package App\Services
 */
class WorkoutHandlerByScore
{
    public function getRandomWorkoutByScore(int $score): Workout
    {
        if (Client::BEGINNER_RANGE[0] <= $score && $score <= Client::BEGINNER_RANGE[1]) {
            $workouts = new beginnerWorkout();
            return $workouts->getRandomWorkout();
        }

        if (Client::INTERMEDIATE_RANGE[0] <= $score && $score <= Client::INTERMEDIATE_RANGE[1]) {
            $workouts = new intermediateWorkout();
            return $workouts->getRandomWorkout();
        }

        if (Client::ADVANCED_RANGE[0] <= $score && $score <= Client::ADVANCED_RANGE[1]) {
            $workouts = new advancedWorkout();
            return $workouts->getRandomWorkout();
        }

        if (Client::PRO_RANGE[0] <= $score && $score <= Client::PRO_RANGE[1]) {
            $workouts = new proWorkout();
            return $workouts->getRandomWorkout();
        }

        $workouts = new walkerWorkout();
        return $workouts->getRandomWorkout();
    }
}
