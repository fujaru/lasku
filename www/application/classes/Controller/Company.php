<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Company extends Controller {

	public function before() {
		if(! Auth::instance()->logged_in()) {
			$this->redirect('session/login');
		}
	}
	
	/**
	 * Show company profile
	 */
	public function action_profile()
	{
		// Defaults to ID = 1
		$id = $this->request->param('id');
		if($id == '')
			$id = 1;
			
		$company = Model::factory('Company');
		$company_data = $company->load($id);
		
		if($company_data === FALSE) {
			throw HTTP_Exception::Factory(404, "File not found!");
		}
		
		$view = View::factory('company/profile');
		$view->set('id', $id);
		$view->set('company_data', $company_data);
		$this->response->body($view);
	}
	
	/**
	 * Add a new client
	 */
	//public function action_add()
	//{
		//$view = View::factory('client/edit');
		//$view->set('title', "Add Cient");
		//
		//switch($this->request->method()) {
			//default:
			//case 'GET':
				//$post = array(
					//'is_active' => 1,
				//);
				//$view->set('post', $post);
				//$view->set('referrer', $this->request->referrer());
				//$this->response->body($view);
				//break;
				//
			//case 'POST':
				//$post = $this->request->post();
				//$client = Model::factory('Client');
				//
				//if($client->validate($post)) {
					//$post['entry_by'] = Auth::instance()->get_user_id();
					//$client->save($post);
					//Lasku::flash("Client {$post['name']} is added.");
					//$this->redirect('client');
				//}
				//else {
					//$view->set('post', $post);
					//$view->set('referrer', $post['referrer']);
					//$view->set('errors', $client->errors());
					//$this->response->body($view);
				//}
				//break;
		//}
	//}
	
	/**
	 * Edit company
	 */
	public function action_edit()
	{
		$id = $this->request->param('id');
		$company = Model::factory('Company');
		$view = View::factory('company/edit');
		
		switch($this->request->method()) {
			default:
			case 'GET':
				// Load values
				if(($post = $company->load($id)) === FALSE) {
					throw HTTP_Exception::factory(404, 'File not found!');
				}
				$view->set('post', $post);
				$view->set('referrer', $this->request->referrer());
				$this->response->body($view);
				break;
				
			case 'POST':
				$post = $this->request->post();
				
				if($company->validate($post)) {
					$company->save($post, $id);
					Lasku::flash("Company data is updated.");
					$this->redirect('company/profile');
				}
				else {
					$view->set('post', $post);
					$view->set('referrer', $post['referrer']);
					$view->set('errors', $company->errors());
					$this->response->body($view);
				}
				break;
		}
	}
	
	/**
	 * Delete a client
	 * 
	 * /client/delete/<id>
	 */
	public function action_delete()
	{
		$client = Model::factory('Client');
		$id = $this->request->param('id');
		
		if(!$client->exists($id)) {
			throw HTTP_Exception::factory(404, 'File not found!');
		}
		
		$data = $client->load($id, array('name'));
		$rs = $client->delete($id);
		
		if($rs) {
			Lasku::flash("Client {$data['name']} is deleted.");
			$this->redirect($this->request->referrer());
		}
		else {
			Lasku::flash("Error when deleting {$data['nanem']}.", Lasku::FLASH_ERROR);
			$this->redirect($this->request->referrer());
		}
	}

} // End Dashboard
