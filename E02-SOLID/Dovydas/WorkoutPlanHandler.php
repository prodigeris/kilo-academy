<?php


namespace App\Services;


class WorkoutPlanHandler
{

    public function getByVersionScoreAndCount(int $version, int $score, int $workoutCount,bool $all = false): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        if($all){
            return WorkoutPlan::where('training_plan->version', $version)
                ->where('running_level', $score)
                ->where('workout_count', $workoutCount)
                ->get();
        }

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->first();

    }
    public function getByVersionAndScore(int $version, int $score): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->first();
    }

    public function getByVersionAndCount(int $version, int $score): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('workout_count', $score)
            ->first();
    }

}