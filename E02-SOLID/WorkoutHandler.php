<?php


namespace App\Services;


class WorkoutHandler implements check
{

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
}