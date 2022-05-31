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

        $this->getNavBarItemsForCurrentUser('user');

        $this->template->header = View::factory('header',
            ['navBarElements' => $this->getNavBarItemsForCurrentUser()]);
    }

    private function getNavBarItemsForCurrentUser(): array
    {
        $navItemsConfig = Kohana::$config->load('navItems')->items;

        if (Auth::instance()->logged_in('super_admin')) {
            $adminNavItemsConfig = Kohana::$config->load('navItems')->adminItems;
            $superAdminNavItemsConfig = Kohana::$config->load('navItems')->superAdminItems;

            $allNavItems = array_merge($superAdminNavItemsConfig, $adminNavItemsConfig, $navItemsConfig);
            unset($allNavItems['login']);

            return $allNavItems;
        }

        if (Auth::instance()->logged_in('admin')) {
            $adminNavItemsConfig = Kohana::$config->load('navItems')->adminItems;

            $allNavItems = array_merge($adminNavItemsConfig, $navItemsConfig);
            unset($allNavItems['login']);

            return $allNavItems;
        }

        if (Auth::instance()->logged_in('login')) {
            unset($navItemsConfig['login']);

            return $navItemsConfig;
        }

        unset($navItemsConfig['logout']);

        return $navItemsConfig;
    }
}