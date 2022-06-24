<?php defined('SYSPATH') or die('No direct script access.');

class Controller_UserStandard extends Controller_Standard
{

    public function before()
    {
        if (!Auth::instance()->logged_in('login')) {
            Controller::redirect('index/index');
        }

        parent::before();
    }
}