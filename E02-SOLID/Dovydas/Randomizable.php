<?php


namespace App\Services;


interface Randomizable
{
    public function getRandomWorkout($visible = false): Workout;
}