<?php

declare(strict_types=1);

namespace App\Services;

use App\Client;
use App\Workout;
use Illuminate\Support\Facades\Schema;

/**
 * Class WorkoutManager
 *
 * @package App\Services
 */
class WorkoutManager
{
    protected array $walkerWorkouts;

    protected array $beginnerWorkouts;

    protected array $intermediateWorkouts;

    protected array $advancedWorkouts;

    protected array $proWorkouts;

    public function __construct()
    {
        if (!Schema::hasTable('workouts')) {
            return;
        }

        $this->walkerWorkouts = Workout::whereBetween('level', Client::WALKER_RANGE)->pluck('id')->toArray();
        $this->beginnerWorkouts = Workout::whereBetween('level', Client::BEGINNER_RANGE)->pluck('id')->toArray();
        $this->intermediateWorkouts = Workout::whereBetween('level', Client::INTERMEDIATE_RANGE)->pluck('id')->toArray();
        $this->advancedWorkouts = Workout::whereBetween('level', Client::ADVANCED_RANGE)->pluck('id')->toArray();
        $this->proWorkouts = Workout::whereBetween('level', Client::PRO_RANGE)->pluck('id')->toArray();
    }
}
