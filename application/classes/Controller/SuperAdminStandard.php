<?php defined('SYSPATH') or die('No direct script access.');

class Controller_SuperAdminStandard extends Controller_AdminStandard
{
    public function before()
    {
        if (!Auth::instance()->logged_in('super_admin')) {
            Controller::redirect('index/index');
        }

        parent::before();
    }

    public function action_index()
    {

    }
}