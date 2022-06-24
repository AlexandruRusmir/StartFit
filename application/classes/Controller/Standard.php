<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Standard extends Controller_Template
{
    public $template = 'templates/default';

    public function before()
    {
        if ($this->request->is_ajax()) {
            $this->auto_render = FALSE;
            return;
        }

        parent::before();

        $this->getNavBarItemsForCurrentUser();

        $this->template->header = View::factory('header',
                ['navBarElements' => $this->getNavBarItemsForCurrentUser()]);
    }

    private function getNavBarItemsForCurrentUser(): array
    {
        $navItemsConfig = Kohana::$config->load('navItems')->items;

        if (Auth::instance()->logged_in('super_admin')) {
            $adminNavItemsConfig = Kohana::$config->load('navItems')->adminItems;
            $superAdminNavItemsConfig = Kohana::$config->load('navItems')->superAdminItems;
            $userNavItemsConfig = Kohana::$config->load('navItems')->userItems;

            $allNavItems = array_merge($superAdminNavItemsConfig, $adminNavItemsConfig, $userNavItemsConfig, $navItemsConfig);
            unset($allNavItems['login']);

            return $allNavItems;
        }

        if (Auth::instance()->logged_in('admin')) {
            $adminNavItemsConfig = Kohana::$config->load('navItems')->adminItems;
            $userNavItemsConfig = Kohana::$config->load('navItems')->userItems;

            $allNavItems = array_merge($adminNavItemsConfig, $userNavItemsConfig, $navItemsConfig);
            unset($allNavItems['login']);

            return $allNavItems;
        }

        if (Auth::instance()->logged_in('login')) {
            $userNavItemsConfig = Kohana::$config->load('navItems')->userItems;

            $allNavItems = array_merge($userNavItemsConfig, $navItemsConfig);
            unset($allNavItems['login']);

            return $allNavItems;
        }

        unset($navItemsConfig['logout']);

        return $navItemsConfig;
    }
}