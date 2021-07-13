<?php


namespace App\Services;


class walkerWorkout extends AbstractWorkout
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
        $this->allWalkerWorkouts = Workout::whereBetween('level', Client::WALKER_RANGE)->pluck('id')->toArray();
    }


}