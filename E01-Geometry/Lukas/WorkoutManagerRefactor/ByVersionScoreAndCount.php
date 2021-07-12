<?php


namespace App\Services;

interface ByVersionScoreAndCount
{
    /**
     * @param int $version
     * @param int $score
     * @param int $workoutCount
     * @return mixed
     */
    public function filter(int $version, int $score, int $workoutCount);
}