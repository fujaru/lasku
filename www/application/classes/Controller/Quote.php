<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Quote extends Controller {

	public function before() {
		if(! Auth::instance()->logged_in()) {
			$this->redirect('session/login');
		}
	}
	
	public function action_index()
	{
		return $this->action_list();
	}
	
	/**
	 * List all quotes, with filtering options
	 */
	public function action_list()
	{
		$client = Model::factory('Client');
		$rs = $client->select()
			//->select('id', 'name', 'email', 'phone', 'is_active')
			->order_by('name')
			->execute();
		$client_data = $rs->as_array();
		
		// Remap client data for JS lookup
		$client_details = array();
		foreach($client_data as $item) {
			$client_details[$item['id']] = $item;
		}
		
		$view = View::factory('client/list');
		$view->set('client_data', $client_data);
		$view->set('client_details', $client_details);
		$this->response->body($view);
	}
	
	/**
	 * Add a new client
	 */
	public function action_add()
	{
		$view = View::factory('client/edit');
		$view->set('title', "Add Cient");
		
		switch($this->request->method()) {
			default:
			case 'GET':
				$post = array(
					'is_active' => 1,
				);
				$view->set('post', $post);
				$view->set('referrer', $this->request->referrer());
				$this->response->body($view);
				break;
				
			case 'POST':
				$post = $this->request->post();
				$client = Model::factory('Client');
				
				if($client->validate($post)) {
					$post['entry_by'] = Auth::instance()->get_user_id();
					$client->save($post);
					Lasku::flash("Client {$post['name']} is added.");
					$this->redirect('client');
				}
				else {
					$view->set('post', $post);
					$view->set('referrer', $post['referrer']);
					$view->set('errors', $client->errors());
					$this->response->body($view);
				}
				break;
		}
	}
	
	/**
	 * Edit client
	 */
	public function action_edit()
	{
		$id = $this->request->param('id');
		$client = Model::factory('Client');
		$view = View::factory('client/edit');
		$view->set('title', "Edit Client");
		
		switch($this->request->method()) {
			default:
			case 'GET':
				// Load values
				if(($post = $client->load($id)) === FALSE) {
					throw HTTP_Exception::factory(404, 'File not found!');
				}
				$view->set('post', $post);
				$view->set('referrer', $this->request->referrer());
				$this->response->body($view);
				break;
				
			case 'POST':
				$post = $this->request->post();
				
				if($client->validate($post)) {
					$client->save($post, $id);
					Lasku::flash("Client {$post['name']} is updated.");
					$this->redirect('client');
				}
				else {
					$view->set('post', $post);
					$view->set('referrer', $post['referrer']);
					$view->set('errors', $client->errors());
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
