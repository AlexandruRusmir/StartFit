<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Standard
{

    public function action_index()
    {
        $this->template->main = View::factory('index');
    }

    public function getCurrentUserRoles()
    {
        $userModel = Auth::instance()->get_user();

        $roles = $userModel->roles->find_all();
        foreach ($roles as $role) {
            print_r($role->as_array());
        }
    }

    public function action_get_current_user_information()
    {
        if (Auth::instance()->logged_in('login')) {
            $this->response->body('user');
            return;
        }

        $this->response->body('viewer');
    }
}