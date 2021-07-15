<?php


namespace App\Services;


interface ByVersionAndScore
{
    /**
     * @param int $version
     * @param int $score
     * @return mixed
     */
    public function filterWorkout(int $version, int $score);
}
