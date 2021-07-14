<?php


namespace App\Services;


abstract class AbstractWorkout implements Randomizable
{
    abstract public function getAllWorkouts(): array;

    abstract public function getRandomWorkout($visible = false): Workout;

    public function getRandom(): Workout
    {
        return $this->getRandomWorkout();
    }
}
