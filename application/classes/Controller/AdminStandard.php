<?php defined('SYSPATH') or die('No direct script access.');

class Controller_AdminStandard extends Controller_Standard
{

    public function before()
    {
        if (!Auth::instance()->logged_in('admin') && !Auth::instance()->logged_in('super_admin')) {
            Controller::redirect('index/index');
        }

        parent::before();
    }
}