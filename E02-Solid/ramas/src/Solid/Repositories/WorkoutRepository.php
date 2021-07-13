<?php

declare(strict_types=1);

namespace Kilo\Solid\Repositories;

use RuntimeException;

class WorkoutRepository
{
    public function getRandomWorkout(): Workout
    {
        $workout = Workout::inRandomOrder()->first();

        if (!$workout) {
            throw new RuntimeException('No workout has been found.');
        }

        return $workout;
    }

    public function getRandomVisibleWorkout(): Workout
    {
        $workout = Workout::where('is_visible', true)->inRandomOrder()->first();

        if (!$workout) {
            throw new RuntimeException('No workout has been found.');
        }

        return $workout;
    }

    public function getWorkoutById(int $id): ?Workout
    {
        if (!$id) {
            return null;
        }

        return Workout::find($id);
    }

    public function getWorkoutByLevelRange(array $level): array
    {
        $workouts = Workout::whereBetween('level', $level)->pluck('id')->toArray();

        if (empty($workouts)) {
            return null;
        }

        return $workouts;
    }
}
