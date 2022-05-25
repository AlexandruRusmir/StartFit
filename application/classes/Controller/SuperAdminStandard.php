<?php defined('SYSPATH') or die('No direct script access.');

class Controller_SuperAdminStandard extends Controller_Standard
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

    public function action_returnUsersList(): View
    {
        $this->auto_render = false;

        $keyword = $this->request->query('keyword');
        $returnedUserArray = [];

        $users = ORM::factory('user');
        if ($keyword) {
            $users->where('username', 'LIKE', "%{$keyword}%");
        }
        $users->find_all();

        $userListViews = [];
        forEach ($users as $user) {
            $userListViews[] = View::factory('userListItem', [ 'user' => $this->getCustomUserObject($user)]);
        }

        return View::factory('userList', [ 'userListViews' => $userListViews] );
    }

    private function getCustomUserObject(Model_User $user): object
    {
        $userObject = (object) [];
        $userObject->username = $user->username;
        $userObject->email = $user->email;

        $roles = $user->roles->find_all();
        $rolesString = '';

        $rolesCount = count($roles);
        foreach($roles as $key => $role) {
            $rolesString .=  $role->name;

            if($key < $rolesCount - 1) {
                $rolesString .= ', ';
            }
        }

        $userObject->roles = $rolesString;

        return $userObject;
    }
}