<?php


namespace App\Services;

use App\WorkoutPlan;
use Illuminate\Support\Collection;

class GetAll implements ByVersionScoreAndCount
{
    /**
     * @param int $version
     * @param int $score
     * @param int $workoutCount
     * @return Collection|WorkoutPlan[]
     */
    public function filter(int $version, int $score, int $workoutCount): Collection
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->get();
    }

}