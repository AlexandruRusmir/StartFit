<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Register extends Controller_Standard {

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

        if(md5($password) != md5($confirmPassword))
            $this->template->main = View::factory('register', ['message' => 'Password is not the same as confirmed password.']);


        $userModel = ORM::factory('User');
        try{
            $userModel->email = $email;
            $userModel->username = $userName;
            $userModel->password = $password;

            $userModel->save();

            $userModel->add('roles', ORM::factory('role')->where('name', '=', 'login')->find());
            Auth::instance()->login($userModel->username, $userModel->password, true);

            Controller::redirect('index/index');
        }
        catch (Exception $e) {
            print_r( $e->getMessage());
            die();
        }
        //HTTP::redirect('/');
    }

    public function action_login()
    {
        $userName = $this->request->post("username");
        $password = $this->request->post('password');

        $success = '';
        try{
            $success = Auth::instance()->login($userName, $password, true);
        }
        catch (Exception $e) {
            print_r($e->getMessage());
        }

        Controller::redirect('index/index');
    }

    public function action_logout()
    {
        Auth::instance()->logout(true);
        try {
            Controller::redirect('index/index');
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}