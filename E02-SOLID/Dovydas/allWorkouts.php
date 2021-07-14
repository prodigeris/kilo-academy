<?php

namespace App\Services;
class allWorkouts extends AbstractWorkout
{

    private $allWorkouts;

    public function getAllWorkouts(): array
    {
        return $this->allWorkouts;
    }
    public function __construct()
    {
        $this->allWorkouts = Workout::pluck('id')->toArray();
    }

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