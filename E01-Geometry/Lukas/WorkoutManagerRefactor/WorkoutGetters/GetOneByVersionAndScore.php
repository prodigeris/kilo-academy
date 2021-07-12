<?php


namespace App\Services;

use App\WorkoutPlan;

class GetOneByVersionAndScore implements ByVersionAndScore
{
    /**
     * @param int $version
     * @param int $score
     * @return WorkoutPlan|null
     */
    public function filterWorkout(int $version, int $score): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->first();
    }
}
