<?php


namespace App\Services;


class WorkoutPlanHandler
{
    private ?int $version;

    public function __construct(?int $version)
    {
        $this->version = $version;
    }

    public function getOneByVersionScoreAndCount(int $score, int $workoutCount): ?WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->first();
    }

    /**
     * @return Collection|WorkoutPlan[]
     */
    public function getAllByVersionScoreAndCount(int $score, int $workoutCount): Collection
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->get();
    }

    public function getByVersionAndScore(int $score): ?WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('running_level', $score)
            ->first();
    }

    public function getByVersionAndCount(int $score): ?WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('workout_count', $score)
            ->first();
    }
}