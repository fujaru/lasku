<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Session controller
 * 
 * Handles login/logout and session related actions.
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
class Controller_Session extends Controller {

	public function before() {
		if(! Auth::instance()->logged_in() AND $this->request->action() !== 'login') {
			$this->redirect('session/login');
		}
	}
	
	/**
	 * Display login form and do login
	 */
	public function action_login()
	{
		switch($this->request->method()) {
			default:
			case 'GET':
				$view = View::factory('session/login');
				$referrer = Session::instance()->get_once('login_referrer');
				$view->set('referrer', $referrer);
				$this->response->body($view);
				break;
				
			case 'POST':
				$post = $this->request->post();
				$success = Auth::instance()->login($post['email'], $post['password']);
				
				if($success) {
					if($post['referrer'] != '')
						$this->redirect($post['referrer']);
					else
						$this->redirect('');
				}
				else {
					Lasku::flash("Invalid email/password.", Lasku::FLASH_ERROR);
					$view = View::factory('session/login');
					$view->set('referrer', $post['referrer']);
					$this->response->body($view);
				}
				break;
		}
	}
	
	/**
	 * Logout from session
	 */
	public function action_logout()
	{
		Auth::instance()->logout();
		$this->redirect($this->request->referrer(), 302);
	}

} // End Dashboard
