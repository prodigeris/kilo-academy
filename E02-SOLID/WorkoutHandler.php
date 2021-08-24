<?php


namespace App\Services;


use Cassandra\Collection;

class WorkoutHandler implements check
{
    private ?int $version;
    private int $score;

    public function __construct(?int $version, int $score)
    {
        $this->version = $version;
        $this->score = $score;
    }

    public function getOneByVersionScoreAndCount(int $workoutCount): array|Collection
    {
        $checkedVersion = $this->checkByParameter($this->version, 1);
        return $this->getWorkoutsPlanByParameters($checkedVersion, $this->score, $workoutCount, 'first');
    }

    /**
     * @return Collection|WorkoutPlan[]
     */
    public function getAllByVersionScoreAndCount(int $workoutCount): Collection
    {
        $checkedVersion = $this->checkByParameter($this->version, 1);
        return $this->getWorkoutsPlanByParameters($checkedVersion, $this->score, $workoutCount, 'get');
    }

    public function getByVersionAndScore(): ?WorkoutPlan
    {
        $checkedVersion = $this->checkByParameter($this->version, 1);
        return $this->getWorkoutsPlanByParameter($checkedVersion, $this->score, 'running_level');
    }

    public function getByVersionAndCount(): ?WorkoutPlan
    {
        $checkedVersion = $this->checkByParameter($this->version, 1);
        return $this->getWorkoutsPlanByParameter($checkedVersion, $this->score, 'workout_count');
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

    private function getWorkoutsPlanByParameter(?int $checkedVersion, int $score, string $parameter): WorkoutPlan
    {
        return WorkoutPlan::where('training_plan->version', $checkedVersion)
            ->where($parameter, $score)
            ->first();
    }

    /**
     * @return Collection|WorkoutPlan[]
     */
    private function getWorkoutsPlanByParameters(?int $checkedVersion, int $score, int $workoutCount, string $function): Collection
    {
        return WorkoutPlan::where('training_plan->version', $checkedVersion)
            ->where('running_level', $score)
            ->where('workout_count', $workoutCount)
            ->$function();
    }
}