<?php defined('SYSPATH') or die('No direct script access.');

class Controller_GenericUser extends Controller_Standard
{
    public function action_get_current_user_information()
    {
        if (Auth::instance()->logged_in('login')) {
            $this->response->body('user');
            return;
        }

        $this->response->body('viewer');
    }

}