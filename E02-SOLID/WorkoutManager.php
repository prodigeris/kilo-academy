<?php

declare(strict_types=1);

namespace App\Services;

use App\Client;
use App\Workout;
use App\WorkoutPlan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use RuntimeException;

require "Check.php";

/**
 * Class TipManager
 *
 * @package App\Services
 */
class WorkoutManager
{
    private array $walkerWorkouts;

    private array $beginnerWorkouts;

    private array $intermediateWorkouts;

    private array $advancedWorkouts;

    private array $proWorkouts;

    public function __construct()
    {
        if (!Schema::hasTable('workouts')) {
            throw new \mysqli_sql_exception("DB don't have 'workouts table'");
        }

        $this->walkerWorkouts = $this->getWhereBetween(Client::WALKER_RANGE);
        $this->beginnerWorkouts = $this->getWhereBetween(Client::BEGINNER_RANGE);
        $this->intermediateWorkouts = $this->getWhereBetween(Client::INTERMEDIATE_RANGE);
        $this->advancedWorkouts = $this->getWhereBetween(Client::ADVANCED_RANGE);
        $this->proWorkouts = $this->getWhereBetween(Client::PRO_RANGE);
    }



    public function getWorkoutIdByScore(int $score): ?int
    {
        if ($this->checkScore($score, Client::BEGINNER_RANGE)) {
            return $this->returnWorkoutIdByScore($this->beginnerWorkouts);
        }

        if ($this->checkScore($score, Client::INTERMEDIATE_RANGE)) {
            return $this->returnWorkoutIdByScore($this->intermediateWorkouts);
        }

        if ($this->checkScore($score, Client::ADVANCED_RANGE)) {
            return $this->returnWorkoutIdByScore($this->advancedWorkouts);
        }

        if ($this->checkScore($score, Client::PRO_RANGE)) {
            return $this->returnWorkoutIdByScore($this->proWorkouts);
        }

        return $this->returnWorkoutIdByScore($this->walkerWorkouts);
    }

    public function getWorkoutByScore(int $score): ?Workout
    {
        $id = $this->getWorkoutIdByScore($score);
        return $this->returnWorkoutById($id);
    }

    /**
     * @return bool|null
     */
    private function checkScore(int $score, ClientEnum $enum): bool
    {
        return ($enum[0] <= $score && $score <= $enum[1]);
    }

    /**
     * @return int|null
     */
    private function returnWorkoutIdByScore(array $workouts): ?int
    {
        if (empty($workouts)) {
            return null;
        }
        return $workouts[array_rand($workouts)];
    }

    /**
     * @return Workout|null
     */
    private function returnWorkoutById(int $id): ?Workout
    {
        if (empty($id)) {
            return null;
        }
        return Workout::find($id);
    }



    private function getWhereBetween(ClientEnum $enum): array
    {
        return Workout::whereBetween('level', $enum)->pluck('id')->toArray();
    }


}