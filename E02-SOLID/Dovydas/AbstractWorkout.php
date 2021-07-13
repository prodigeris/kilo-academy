<?php


namespace App\Services;


abstract class AbstractWorkout implements Randomizable
{
    abstract public function getAllWorkouts(): array;

    public function getRandomWorkout($visible = false): Workout
    {
        if($visible){
            $workout = Workout::where('is_visible', true)->inRandomOrder()->first();
        }
        else{
            $workout = Workout::inRandomOrder()->first();
        }
        if (! $workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }
}
