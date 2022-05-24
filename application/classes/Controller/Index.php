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
        forEach($roles as $role) {
            print_r($role->as_array());
        }
    }
}