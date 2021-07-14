<?php


namespace App\Services;


class beginnerWorkout extends AbstractWorkout
{
    private array|Workout $allWalkerWorkouts;

    /**
     * @return Workout|array
     */
    public function getAllWorkouts(): array
    {
        return $this->allWalkerWorkouts;
    }

    public function __construct()
    {
        $this->allWalkerWorkouts = Workout::whereBetween('level', Client::BEGINNER_RANGE)->pluck('id')->toArray();
    }


    public function getRandomWorkout($visible = false): Workout
    {
        if($visible){
            $workout = Workout::whereBetween('level', Client::BEGINNER_RANGE)->where('is_visible', true)->inRandomOrder()->first();
        }
        else{
            $workout = Workout::whereBetween('level', Client::BEGINNER_RANGE)->inRandomOrder()->first();
        }
        if (! $workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }
}