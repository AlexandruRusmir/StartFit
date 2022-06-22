<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_WorkoutExercise extends ORM
{
    protected $_table_name = 'workouts_exercises';

    public function getID(): int
    {
        return $this->id;
    }

    public function setExerciseID(string $userID): void
    {
        $this->exercise_id = $userID;
    }

    public function getExerciseID(): int
    {
        return $this->exercise_id;
    }

    public function setWorkoutID(string $workoutID): void
    {
        $this->workout_id = $workoutID;
    }

    public function getWorkoutID(): int
    {
        return $this->workout_id;
    }

    public function setExerciseOrder(string $order): void
    {
        $this->order = $order;
    }

    public function getExerciseOrder(): int
    {
        return $this->order;
    }
}