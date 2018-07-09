<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller {

	public function before() {
		if(! Auth::instance()->logged_in()) {
			$this->redirect('session/login');
		}
	}
	
	public function action_index()
	{
		$view = View::factory('dashboard/index');
		$this->response->body($view);
	}

} // End Dashboard
