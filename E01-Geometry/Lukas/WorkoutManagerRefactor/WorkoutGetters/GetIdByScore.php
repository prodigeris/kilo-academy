<?php


namespace App\Services;

use App\Client;
use App\Workout;

class GetIdByScore extends WorkoutManager
{
    /**
     * @param int $score
     * @return int|null
     */
    public function getWorkoutIdByScore(int $score): ?int
    {
        if (Client::BEGINNER_RANGE[0] <= $score && $score <= Client::BEGINNER_RANGE[1]) {
            if (empty($this->beginnerWorkouts)) {
                return null;
            }

            return $this->beginnerWorkouts[array_rand($this->beginnerWorkouts)];
        }

        if (Client::INTERMEDIATE_RANGE[0] <= $score && $score <= Client::INTERMEDIATE_RANGE[1]) {
            if (empty($this->intermediateWorkouts)) {
                return null;
            }

            return $this->intermediateWorkouts[array_rand($this->intermediateWorkouts)];
        }

        if (Client::ADVANCED_RANGE[0] <= $score && $score <= Client::ADVANCED_RANGE[1]) {
            if (empty($this->advancedWorkouts)) {
                return null;
            }

            return $this->advancedWorkouts[array_rand($this->advancedWorkouts)];
        }

        if (Client::PRO_RANGE[0] <= $score && $score <= Client::PRO_RANGE[1]) {
            if (empty($this->proWorkouts)) {
                return null;
            }

            return $this->proWorkouts[array_rand($this->proWorkouts)];
        }

        if (empty($this->walkerWorkouts)) {
            return null;
        }

        return $this->walkerWorkouts[array_rand($this->walkerWorkouts)];
    }
}
