<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Client Model
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
class Model_Client extends Model_Database {
	
	protected $_validation;
	protected $_id;
	
	/**
	 * Create a base Select Query Builder for this model
	 * 
	 * @return Query_Builder_Select
	 */
	public function select()
	{
		$query = DB::select()->from('client');
		return $query;
	}
	
	/**
	 * Get a single client data
	 * 
	 * @param int $id ID of the client
	 * @param array $columns Optionally, name of columns to be retrieved.
	 * @return array Client data. FALSE if not found.
	 */
	public function load($id, $columns = NULL) 
	{
		$query = $this->select()
			->where('id', '=', $id);
			
		// Filter columns
		if(is_array($columns)) {
			foreach($columns as $col) {
				$query->select($col);
			}
		}
		$rs = $query->execute();
		
		if($rs->count() == 0)
			return FALSE;
		else
			return $rs->as_array()[0];
	}
	
	/**
	 * Save data to database
	 * 
	 * Insert a new or update existing data into database.
	 * 
	 * @param array $data Associative array containing row data to be saved.
	 * @param int $id ID to save the data to. If specified, it will do database update, 
	 *    if set to NULL, it will insert a new row.
	 * @return int inserted ID on success, FALSE on error.
	 */
	public function save($data = array(), $id = NULL)
	{
		// Extract only required data
		$columns = array(
			'name', 
			'address1',
			'address2',
			'city',
			'state',
			'zip',
			'country',
			'contact_name',
			'phone',
			'mobile',
			'fax',
			'email',
			'website',
			'notes',
			'is_active',
			'entry_by',
		);
		$datax = array();
		foreach($columns as $key) {
			if(isset($data[$key])) {
				$datax[$key] = $data[$key];
			}
		}
		
		// Validate the data first
		if(!$this->validate($datax))
			return FALSE;
			
		if($id === NULL) {
			return DB::insert('client', $columns)
				->values($datax)
				->execute();
		}
		else {
			if(DB::update('client')
				->set($datax)
				->where('id', '=', $id)
				->execute()
			) {
				return $id;
			}
			else 
				return FALSE;
		}
	}
	
	/**
	 * Delete row with specified ID
	 * 
	 * @param int $id ID to be deleted
	 * @return bool TRUE when successful, FALSE otherwise.
	 */
	public function delete($id)
	{
		return (bool) DB::delete('client')
			->where('id', '=', $id)
			->execute();
	}
	
	/**
	 * Check if a client exists
	 * 
	 * @param int $id ID of the client
	 * @return bool
	 */
	public function exists($id)
	{
		$rs = $this->select()
			->select('id')
			->where('id', '=', $id)
			->execute();
		return (bool) $rs->count();
	}
	
	/**
	 * Validate provided data
	 * 
	 * @param array $data Associative array('column' => 'value')
	 * @return bool
	 */
	public function validate($data)
	{
		if($this->_validation == NULL) {
			$this->_validation = Validation::factory($data)
				->rule('name', 'not_empty');
		}
			
		if($this->_validation->check())
			return TRUE;
		else
			return FALSE;
	}
	
	/**
	 * Get validation errors
	 * 
	 * @return array List of error messages
	 */
	public function errors()
	{
		return $this->_validation->errors('validations/client');
	}
}
