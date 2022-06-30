<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_FinishedWorkout extends ORM
{
    protected $_table_name = 'finished_workouts';

    public function getID(): int
    {
        return $this->id;
    }

    public function setWorkoutID(string $workoutID): void
    {
        $this->workout_id = $workoutID;
    }

    public function getWorkoutID(): int
    {
        return $this->workout_id;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }
}