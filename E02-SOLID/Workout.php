<?php


namespace App\Services;


class Workout
{
    public function getRandomWorkout(): Workout
    {
        $workout = $this->getRandomRecord();
        if (!$workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }

    private function getRandomRecord(): Workout
    {
        return Workout::inRandomOrder()->first();
    }
}