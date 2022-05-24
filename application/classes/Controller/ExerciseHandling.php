<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ExerciseHandling extends Controller_AdminStandard
{
    public function action_displayExercises()
    {
        $this->template->main = View::factory('allExercises');
    }

    public function action_displayAddExercise()
    {
        $this->template->main = View::factory('addExercise');
    }

    public function action_addExercise()
    {

    }

    public function action_getExercises()
    {

    }
}