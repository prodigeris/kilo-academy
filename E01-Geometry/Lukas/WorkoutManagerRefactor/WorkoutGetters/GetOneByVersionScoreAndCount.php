<?php


namespace App\Services;

use App\WorkoutPlan;

class GetOneByVersionScoreAndCount implements ByVersionScoreAndCount
{
    /**
     * @param int $version
     * @param int $score
     * @param int $workoutCount
     * @return WorkoutPlan|null
     */
    public function filterWorkout(int $version, int $score, int $workoutCount): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->first();
    }

}
