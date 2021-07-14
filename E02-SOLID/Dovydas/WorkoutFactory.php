<?php


namespace App\Services;


class WorkoutFactory
{
    public function createWalkerWorkout(): walkerWorkout
    {
        return new walkerWorkout();
    }

    public function createIntermediateWorkout(): intermediateWorkout
    {
        return new intermediateWorkout();
    }

    public function createBeginnerWorkout(): beginnerWorkout
    {
        return new beginnerWorkout();
    }

    public function createAdvancedWorkout(): advancedWorkout
    {
        return new advancedWorkout();
    }

    public function createProWorkout(): proWorkout
    {
        return new proWorkout();
    }

    public function createAllWorkouts():allWorkouts
    {
        return new allWorkouts();
    }






}
