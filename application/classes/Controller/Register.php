<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Register extends Controller_Standard
{

    public function action_index()
    {
        $this->template->main = View::factory('login');

    }

    public function action_display_register()
    {
        $this->template->main = View::factory('register');
    }

    public function action_register()
    {
        $email = $this->request->post('email');
        $userName = $this->request->post('name');
        $password = $this->request->post('password');
        $confirmPassword = $this->request->post('confirmPassword');

        if (md5($password) != md5($confirmPassword))
            $this->template->main = View::factory('register', ['message' => 'Password is not the same as confirmed password.']);


        $userModel = new Model_User();
        try {
            $userModel->setUsername($userName);
            $userModel->setEmail($email);
            $userModel->setPassword($password);

            $userModel->save();

            $userModel->add('roles', ORM::factory('role')->where('name', '=', 'login')->find());
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
        Auth::instance()->login($userName, $password, true);
        Controller::redirect('index/index');
    }

    public function action_login()
    {
        $userName = $this->request->post("username");
        $password = $this->request->post('password');

        $success = '';
        try {
            $success = Auth::instance()->login($userName, $password, true);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

        Controller::redirect('index/index');
    }

    public function action_logout()
    {
        Auth::instance()->logout(true);

        Controller::redirect('index/index');
    }

    public function action_set_user_as_admin(string $userId)
    {
        $userModel = ORM::factory('user', $userId);
        if (!$userModel->loaded()) {
            throw new Exception('userModel');
            return;
        }

        $userModel->add('roles', ORM::factory('role')->where('name', '=', 'admin')->find());
    }
}