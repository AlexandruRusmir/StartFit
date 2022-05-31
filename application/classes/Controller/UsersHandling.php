<?php defined('SYSPATH') or die('No direct script access.');

class Controller_UsersHandling extends Controller_SuperAdminStandard
{
    public function action_displayUsers()
    {
        $this->template->main = View::factory('allUsers');
    }

    public function action_returnUsersList()
    {
        $keyword = $this->request->query('keyword');

        $users = ORM::factory('user');
        if ($keyword) {
            $users = $users->where('username', 'LIKE', "%{$keyword}%");
        }
        $users = $users->find_all();

        $userListViews = [];
        foreach ($users as $user) {
            if ($user->username !== 'superadmin') {
                $userListViews[] = View::factory('userListItem', ['user' => $this->getCustomUserObject($user)]);
            }
        }

        $this->response->body(View::factory('userList', ['userListViews' => $userListViews]));
    }

    private function getCustomUserObject(Model_User $user): object
    {
        $userObject = (object)[];
        $userObject->id = $user->id;
        $userObject->username = $user->username;
        $userObject->email = $user->email;

        $roles = $user->roles->find_all();
        $rolesString = '';

        $rolesCount = count($roles);
        foreach ($roles as $key => $role) {
            $rolesString .= $role->name;

            if ($key < $rolesCount - 1) {
                $rolesString .= ', ';
            }
        }

        $userObject->roles = $rolesString;

        return $userObject;
    }

    public function action_removeAdminByPostID()
    {
        $userId = $this->request->post('id');

        $userModel = ORM::factory('User', $userId);

        if (!$userModel->loaded()) {
            $this->response->body('Please provide a valid user id');
            return;
        }

        if (!$userModel->has('roles', ORM::factory('Role', ['name' => 'admin']))) {
            $this->response->body('User does not have admin role');
            return;
        }

        $userModel->remove('roles', ORM::factory('role')->where('name', '=', 'admin')->find());

        $this->response->body('Succesful action!');
    }

    public function action_addAdminByPostID()
    {
        $userId = $this->request->post('id');

        $userModel = ORM::factory('User', $userId);
        if (!$userModel->loaded()) {
            $this->response->body('Please provide a valid user id');
            return;
        }

        if ($userModel->has('roles', ORM::factory('Role', ['name' => 'admin']))) {
            $this->response->body('User already has admin role');
            return;
        }

        $userModel->add('roles', ORM::factory('role')->where('name', '=', 'admin')->find());

        $this->response->body('Succesful action!');
    }
}