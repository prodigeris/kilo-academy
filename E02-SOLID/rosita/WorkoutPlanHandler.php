<?php


namespace App\Services;


class WorkoutPlanHandler
{
    private ?int $version;
    private int $score;

    public function __construct(?int $version, int $score)
    {
        $this->version = $version;
        $this->score = $score;
    }

    public function getOneByVersionScoreAndCount(int $workoutCount): ?WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('running_level', $this->score)
            ->where('workout_count', $workoutCount)
            ->first();
    }

    /**
     * @return Collection|WorkoutPlan[]
     */
    public function getAllByVersionScoreAndCount(int $workoutCount): Collection
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('running_level', $this->score)
            ->where('workout_count', $workoutCount)
            ->get();
    }

    public function getByVersionAndScore(): ?WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('running_level', $this->score)
            ->first();
    }

    public function getByVersionAndCount(): ?WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $this->version)
            ->where('workout_count', $this->score)
            ->first();
    }
}