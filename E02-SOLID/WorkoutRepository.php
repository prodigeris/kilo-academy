<?php


namespace App\Services;


use RuntimeException;

class WorkoutRepository
{
    public function getRandomWorkout(): Workout
    {
        $workout = $this->getRandomRecord();
        if (!$workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }

    public function getRandomVisibleWorkout(): Workout
    {
        $workout = $this->getRandomVisibleRecord();
        if (!$workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }

    private function getRandomVisibleRecord(): Workout
    {
        return Workout::where('is_visible', true)->inRandomOrder()->first();
    }

    private function getRandomRecord(): Workout
    {
        return Workout::inRandomOrder()->first();
    }
}