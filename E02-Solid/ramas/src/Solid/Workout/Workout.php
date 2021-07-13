<?php

declare(strict_types=1);

use Kilo\Solid\Client\Client;
use Kilo\Solid\Workout\Level;
use Kilo\Solid\Repositories\WorkoutRepository;

class Workout
{
    public function __construct(WorkoutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getWorkoutIdByScore(Level $level): ?int
    {
        $level = $level->getClientLevel();

        switch ($level) {
            case Level::WALKER:
                $workouts = $this->repository->getWorkoutByLevelRange(Client::WALKER_RANGE);
                break;
            case Level::BEGINNER:
                $workouts = $this->repository->getWorkoutByLevelRange(Client::BEGINNER_RANGE);
                break;
            case Level::INTERMEDIATE:
                $workouts = $this->repository->getWorkoutByLevelRange(Client::INTERMEDIATE_RANGE);
                break;
            case Level::ADVANCED:
                $workouts = $this->repository->getWorkoutByLevelRange(Client::ADVANCED_RANGE);
                break;
            case Level::PRO:
                $workouts = $this->repository->getWorkoutByLevelRange(Client::PRO_RANGE);
                break;
            default:
                throw new InvalidArgumentException('Workout by this score doesn\'t exist!');
        }

        return $workouts[array_rand($workouts)];
    }
}
