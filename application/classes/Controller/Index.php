<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Standard
{

	public function action_index()
	{
        $this->template->main = View::factory('index');
	}


}