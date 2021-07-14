<?php


namespace App\Services;

use App\Workout;
use Illuminate\Support\Facades\Schema;

class WorkoutProvider
{
    private array $levels = [];

    public function __construct(array $availableLevels, WorkoutRepository $workoutRepository)
    {
        // should come from config file
        if(! $availableLevels) {
            $availableLevels = [
                ['walker' => [0, 2]],
                ['beginner' => [3, 5]],
                ['intermediate' => [6, 8]],
                ['advanced' => [9, 12]],
                ['pro' => [13, 15]],
            ];
        }

        if (! Schema::hasTable('workouts')) {
            return;
        }

        // 0  => [walkerWorkouts]
        // 3  => [beginnerWorkouts]
        // 6  => [intermediateWorkouts]
        // 9  => [advancedWorkouts]
        // 13 => [proWorkouts]
        foreach($availableLevels as $key => $level) {
            $this->levels[$level[0]] = $workoutRepository->findBetweenScores($level);
        }
    }

    public function getAvailableLevels(): array
    {
        return array_keys($this->levels);
    }

    private function getLastStep(int $score): int
    {
        $availableLevels = $this->getAvailableLevels();
        // [0, 3, 6, 9, 13]
        foreach ($availableLevels as $level) {
            if ($level > $score) {
                break;
            }
            $foundLevel = $level;
        }
        return $foundLevel;
    }

    public function getWorkoutIdByScore(int $score): ?int
    {
        $level = $this->getLastStep($score);

        return array_rand($this->levels[$level]);
    }

    public function getWorkoutByScore(int $score): ?Workout
    {
        $id = $this->getWorkoutIdByScore($score);
        if (! $id) {
            return null;
        }

        return Workout::find($id);
    }
}