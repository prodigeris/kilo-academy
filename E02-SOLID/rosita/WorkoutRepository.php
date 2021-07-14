<?php

declare(strict_types=1);

namespace App\Services;

use App\Workout;
use Illuminate\Support\Facades\Schema;
use RuntimeException;

/**
 * Class TipManager
 *
 * @package App\Services
 */
class WorkoutRepository
{
    public function __construct()
    {
        if (! Schema::hasTable('workouts')) {
            return;
        }
    }

    public function getRandomWorkout(): Workout
    {
        $workout = Workout::inRandomOrder()->first();
        if (! $workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }

    public function getRandomVisibleWorkout(): Workout
    {
        $workout = Workout::where('is_visible', true)->inRandomOrder()->first();
        if (! $workout) {
            throw new RuntimeException('No workout has been found');
        }
        return $workout;
    }

    public function findBetweenScores($level): array
    {
        // some logic here
    }
}
