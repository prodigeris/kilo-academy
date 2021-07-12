<?php


namespace App\Services;


class WorkoutProvider
{
    private int $score;
    private string $level;

    private array $walkerWorkouts;
    private array $beginnerWorkouts;
    private array $intermediateWorkouts;
    private array $advancedWorkouts;
    private array $proWorkouts;

    public function __construct(int $score)
    {
        $this->score = $score;
        $this->walkerWorkouts = Workout::whereBetween('level', Client::WALKER_RANGE)->pluck('id')->toArray();
        $this->beginnerWorkouts = Workout::whereBetween('level', Client::BEGINNER_RANGE)->pluck('id')->toArray();
        $this->intermediateWorkouts = Workout::whereBetween('level', Client::INTERMEDIATE_RANGE)->pluck('id')->toArray();
        $this->advancedWorkouts = Workout::whereBetween('level', Client::ADVANCED_RANGE)->pluck('id')->toArray();
        $this->proWorkouts = Workout::whereBetween('level', Client::PRO_RANGE)->pluck('id')->toArray();

        $this->assignLevel();
    }

    public function assignLevel(): void
    {
        // some logic here
    }

    public function getWorkoutIdByScore(): ?int
    {
        // need to get rid of these similar IF's -> new parent class with assigned level? or new method?...

        if (Client::BEGINNER_RANGE[0] <= $this->score && $this->score <= Client::BEGINNER_RANGE[1]) {
            return empty($this->beginnerWorkoutsWorkouts) ? null : $this->beginnerWorkouts[array_rand($this->beginnerWorkouts)];
        }

        if (Client::INTERMEDIATE_RANGE[0] <= $this->score && $this->score <= Client::INTERMEDIATE_RANGE[1]) {
            if (empty($this->intermediateWorkouts)) {
                return null;
            }

            return $this->intermediateWorkouts[array_rand($this->intermediateWorkouts)];
        }

        if (Client::ADVANCED_RANGE[0] <= $this->score && $this->score <= Client::ADVANCED_RANGE[1]) {
            if (empty($this->advancedWorkouts)) {
                return null;
            }

            return $this->advancedWorkouts[array_rand($this->advancedWorkouts)];
        }

        if (Client::PRO_RANGE[0] <= $this->score && $this->score <= Client::PRO_RANGE[1]) {
            if (empty($this->proWorkouts)) {
                return null;
            }

            return $this->proWorkouts[array_rand($this->proWorkouts)];
        }

        if (empty($this->walkerWorkouts)) {
            return null;
        }

        return $this->walkerWorkouts[array_rand($this->walkerWorkouts)];
    }

    public function getWorkoutByScore(int $score): ?Workout
    {
        $id = $this->getWorkoutIdByScore($score);
        if (! $id) {
            return null;
        }

        return Workout::find($id);
    }
}