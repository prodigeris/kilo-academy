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

    public function getRandomVisibleWorkout(): Workout
    {
        $workout = $this->getRandomVisibleRecord();
        if (!$workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
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

    public function getOneByVersionScoreAndCount(int $version, int $score, int $workoutCount): ?WorkoutPlan
    {
        $checkedVersion = $this->checkByParameter($version, 1);
        return $this->getWorkoutsPlanByParameters($checkedVersion, $score, $workoutCount, 'first');
    }

    public function getAllByVersionScoreAndCount(int $version, int $score, int $workoutCount): ?WorkoutPlan
    {
        $checkedVersion = $this->checkByParameter($version, 1);
        return $this->getWorkoutsPlanByParameters($checkedVersion, $score, $workoutCount, 'get');
    }


    public function getByVersionAndScore(int $version, int $score): ?WorkoutPlan
    {
        $checkedVersion = $this->checkByParameter($version, 1);
        return $this->getWorkoutsPlanByParameter($checkedVersion, $score, 'running_level');
    }

    public function getByVersionAndCount(int $version, int $score): ?WorkoutPlan
    {
        $checkedVersion = $this->checkByParameter($version, 1);
        return $this->getWorkoutsPlanByParameter($checkedVersion, $score, 'workout_count');
    }

    /**
     * @return int|null
     */
    public function checkByParameter(int $firstParameter, int $secondParameter): ?int
    {
        if ($firstParameter === $secondParameter) {
            return null;
        }
        return $firstParameter;
    }

    /**
     * @return bool|null
     */
    private function checkScore(int $score, ClientEnum $enum): bool
    {
        return ($enum[0] <= $score && $score <= $enum[1]);
        //return Client::BEGINNER_RANGE[0] <= $score && $score <= Client::BEGINNER_RANGE[1];
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

    private function getWorkoutsPlanByParameter(?int $checkedVersion, int $score, string $parameter): WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $checkedVersion)
            ->where($parameter, $score)
            ->first();
    }

    private function getWorkoutsPlanByParameters(?int $checkedVersion, int $score, int $workoutCount, string $function): ?WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $checkedVersion)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->$function();
    }

    private function getWhereBetween(ClientEnum $enum): array
    {
        return Workout::whereBetween('level', $enum)->pluck('id')->toArray();
    }

    private function getRandomVisibleRecord(): Workout
    {
        return Workout::where('is_visible', true)->inRandomOrder()->first();
    }
}

interface check
{
    public function checkByParameter(int $parameter1, int $parameter2);
}
