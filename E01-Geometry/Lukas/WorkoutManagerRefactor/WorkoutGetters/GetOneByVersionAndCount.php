<?php


namespace App\Services;

use App\WorkoutPlan;

class GetOneByVersionAndCount implements ByVersionAndCount
{
    /**
     * @param int $version
     * @param int $workoutCount
     * @return WorkoutPlan|null
     */
    public function filterWorkout(int $version, int $workoutCount): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('workout_count', $workoutCount)
            ->first();
    }
}
