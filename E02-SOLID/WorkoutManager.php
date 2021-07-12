<?php

declare(strict_types=1);

namespace App\Services;

use App\Client;
use App\Workout;
use App\WorkoutPlan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use RuntimeException;

/**
 * Class TipManager
 *
 * @package App\Services
 */
class WorkoutManager implements check
{
    private array $walkerWorkouts;

    private array $beginnerWorkouts;

    private array $intermediateWorkouts;

    private array $advancedWorkouts;

    private array $proWorkouts;

    private $checkInterface;

    public function __construct(check $checkInterface)
    {
        if (! Schema::hasTable('workouts')) {
            throw new \mysqli_sql_exception("DB don't have 'workouts table'");
        }
        $this->checkInterface =$checkInterface;
        $this->walkerWorkouts = $this->getWhereBetween(Client::WALKER_RANGE);
        $this->beginnerWorkouts = $this->getWhereBetween(Client::BEGINNER_RANGE);
        $this->intermediateWorkouts = $this->getWhereBetween(Client::INTERMEDIATE_RANGE);
        $this->advancedWorkouts = $this->getWhereBetween(Client::ADVANCED_RANGE);
        $this->proWorkouts = $this->getWhereBetween(Client::PRO_RANGE);
    }
    public function getRandomVisibleWorkout(): Workout
    {
        $workout = $this->getRandomVisibleRecord();
        if (!$workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }

    private function getWhereBetween(enum $enum):array
    {
        return Workout::whereBetween('level', $enum)->pluck('id')->toArray();
    }

    private function getRandomVisibleRecord(): Workout
    {
        return Workout::where('is_visible', true)->inRandomOrder()->first();
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

        if (empty($this->walkerWorkouts)) {
            return null;
        }

        return $this->walkerWorkouts[array_rand($this->walkerWorkouts)];
    }

    public function getWorkoutByScore(int $score): ?Workout
    {

        $id = $this->checkInterface->getWorkoutIdByScore($score);
        if (! $id) {
            return null;
        }

        return Workout::find($id);
    }

    public function getOneByVersionScoreAndCount(int $version, int $score, int $workoutCount): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->first();
    }

    /**
     * @return Collection|WorkoutPlan[]
     */
    public function getAllByVersionScoreAndCount(int $version, int $score, int $workoutCount): Collection
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->get();
    }

    public function getByVersionAndScore(int $version, int $score): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        $version = $this->workoutCheck->checkByParameter($version, 1);

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('running_level', $score)
            ->first();
    }

    public function getByVersionAndCount(int $version, int $score): ?WorkoutPlan
    {
        $version = $version === 1 ? null : $version;

        return WorkoutPlan::where('training_plan->version', $version)
            ->where('workout_count', $score)
            ->first();
    }

    /**
     * @return int|null
     */
    public function checkByParameter(int $firstParameter, int $secondParameter)
    {
        return $firstParameter === $secondParameter ? null : $firstParameter;
    }

    /**
     * @return int|null
     */
    private function checkScore(int $score, enum $enum): bool
    {
        return ($enum[0] <= $score && $score <= $enum[1]);
        //return Client::BEGINNER_RANGE[0] <= $score && $score <= Client::BEGINNER_RANGE[1];
    }

    /**
     * @return bool|null
     */
    private function returnWorkoutIdByScore(array $workouts): ?bool
    {
        if(empty($workouts)) {return null;}
        return $workouts[array_rand($workouts)];
    }
}

interface check
{
    public function checkByParameter(int $parameter1, int $parameter2);
}


