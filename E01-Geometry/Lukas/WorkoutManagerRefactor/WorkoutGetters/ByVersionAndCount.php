<?php


namespace App\Services;

interface ByVersionAndCount
{
    /**
     * @param int $version
     * @param int $workoutCount
     * @return mixed
     */
    public function filterWorkout(int $version, int $workoutCount);
}
