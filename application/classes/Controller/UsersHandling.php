<?php defined('SYSPATH') or die('No direct script access.');

class Controller_UsersHandling extends Controller_SuperAdminStandard
{
    public function action_displayUsers()
    {
        $this->template->main = View::factory('allUsers');
    }

    public function action_returnUsers(): array
    {
        return [];
    }
}