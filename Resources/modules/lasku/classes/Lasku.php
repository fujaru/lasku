<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Lasku utilities
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
class Lasku {
	
	// Cache of system configurations
	protected static $_config_data = array();
	
	// Flash message flags
	const FLASH_INFO = 1;
	const FLASH_ERROR = 2;
	const FLASH_WARNING = 4;
	
	/**
	 * Set/get flash message
	 * 
	 * Set flash message. If $message is NULL, it will act as a getter.
	 * When getting flash message, the last flash message will automatically 
	 * cleared. So it can only retrieve message once.
	 * 
	 * @param string $message Message to be sent.
	 * @param int $flags Message flags. See Lasku::FLASH_* constants.
	 * @return array Last flash message set. NULL if not available.
	 * 
	 * @since 0.1.0
	 */
	public static function flash($message = NULL, $flags = Lasku::FLASH_INFO) 
	{
		if($message == NULL)
			return Session::instance()->get_once('flash_message');
		
		Session::instance()->set('flash_message', array(
			'message' => $message,
			'flags' => $flags,
		));
	}
	
	/**
	 * Get config value
	 * 
	 * @param string $name Config name
	 * @return string Config value
	 */
	public static function get_config($name)
	{
		// Check config cache
		if(isset(Lasku::$_config_data[$name]))
			return Lasku::$_config_data[$name];
			
		$rs = DB::select()
			->from('config')
			->where('name', '=', $name)
			->execute();
		
		if($rs->count() == 0) {
			throw new Exception("Config option '{$name}' not found.");
		}
		else {
			Lasku::$_config_data[$name] = $rs->as_array()[0]['value'];
			return Lasku::$_config_data[$name];
		}
	}
	
	/**
	 * Set config value
	 * 
	 * @param string $name Config name
	 * @param string $value Config value
	 */
	public static function set_config($name, $value)
	{
		Lasku::$_config_data[$name] = $value;
		$rs = DB::update('config')
			->set(array('value' => $value))
			->where('name', '=', $name)
			->execute();
		if($rs) {
			return $value;
		}
		else {
			throw new Exception("Config option '{$name}' not found.");
		}
	}
}
