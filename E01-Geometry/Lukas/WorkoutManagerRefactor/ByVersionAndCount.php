<?php


namespace App\Services;


interface ByVersionAndCount
{
    public function filterWorkout(int $version, int $workoutCount);
}