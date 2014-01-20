<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Company Model
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
class Model_Company extends Model_Lasku {
	
	protected $_table_name = 'company';
	protected $_editable_columns = array(
		'name',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'country',
		'phone',
		'mobile',
		'fax',
		'email',
		'website',
		'entry_by',
	);
	
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
		return $this->_validation->errors('validations/company');
	}
}
