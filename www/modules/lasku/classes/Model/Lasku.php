<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Base Model for Lasku
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
abstract class Model_Lasku extends Model_Database {
	
	protected $_table_name = NULL;
	protected $_editable_columns = NULL;
	
	protected $_validation;
	protected $_id;
	
	public function __construct() {
		// Validate internal variables
		if($this->_table_name === NULL) {
			throw new Exception("\$_table_name must be defined on derived class.");
		}
		if($this->_editable_columns === NULL) {
			throw new Exception("\$_editable_columns must be defined on derived class.");
		}
	}
	
	/**
	 * Create a base Select Query Builder for this model
	 * 
	 * @return Query_Builder_Select
	 */
	public function select()
	{
		$query = DB::select()->from($this->_table_name);
		return $query;
	}
	
	/**
	 * Get a single row data
	 * 
	 * @param int $id ID of the row
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
		$columns = $this->_editable_columns;
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
			return DB::insert($this->_table_name, $columns)
				->values($datax)
				->execute();
		}
		else {
			if(DB::update($this->_table_name)
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
		return (bool) DB::delete($this->_table_name)
			->where('id', '=', $id)
			->execute();
	}
	
	/**
	 * Check if a row exists
	 * 
	 * @param int $id ID of the row
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
	abstract public function validate($data);
	
	/**
	 * Get validation errors
	 * 
	 * @return array List of error messages
	 */
	abstract public function errors();
}
