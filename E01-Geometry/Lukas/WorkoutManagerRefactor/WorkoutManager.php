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
    protected array $levels = [];

    public function __construct(array $availableLevels, WorkoutRepository $workoutRepository)
    {
        if(! $availableLevels) {
            $availableLevels = [
                ['walker' => [0, 2]],
                ['beginner' => [3, 5]],
                ['intermediate' => [6, 8]],
                ['advanced' => [9, 12]],
                ['pro' => [13, 15]],
            ];
        }

        if (!Schema::hasTable('workouts')) {
            return;
        }

        foreach($availableLevels as $key => $level) {
            $this->levels[$level[0]] = $workoutRepository->findBetweenScores($level);
        }
    }

    private function getAvailableLevels(): array
    {
        return array_keys($this->levels);
    }

    protected function getLastStep(int $score): int
    {
        $levels = $this->getAvailableLevels();
        foreach ($levels as $level) {
            if ($level > $score) {
                break;
            }
            $foundLevel = $level;
        }
        return $foundLevel;
    }
}
