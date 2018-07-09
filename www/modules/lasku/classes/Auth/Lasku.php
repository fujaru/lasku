<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Lasku Auth Driver
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
class Auth_Lasku extends Auth { 
	
	/**
	 * Logs a user in.
	 *
	 * @param   string   $username  Username
	 * @param   string   $password  Password
	 * @param   boolean  $remember  Enable autologin (not supported)
	 * @return  boolean
	 */
	protected function _login($username, $password, $remember)
    {
		if (is_string($password))
		{
			// Create a hashed password
			$password = $this->hash($password);
		}
		
		// Check username/password on database
		if ($this->password($username) === $password)
		{
			// Complete the login
			$this->complete_login($username);
			
			// Load login data
			$auth_data = array();
			$rs = DB::select()
				->from('user')
				->where('email', '=', $username)
				->execute();
			$auth_data = $rs->current();
			
			// Store login data
			$this->_session->set('auth_data', $auth_data);
			
			return TRUE;
		}

		// Login failed
		return FALSE;
    }
	
	/**
	 * Get the stored password for a username.
	 *
	 * @param   mixed   $username  Username
	 * @return  string
	 */
    public function password($username)
    {
		$rs = DB::select('id', 'password')
			->from('user')
			->where('email', '=', $username)
			->execute();
		if($rs->count() > 0)
			return $rs->get('password');
		else
			return FALSE;
    }
 
	/**
	 * Compare password with original (plain text). Works for current (logged in) user
	 *
	 * @param   string   $password  Password
	 * @return  boolean
	 */
    public function check_password($password)
    {
		$username = $this->get_user();

		if ($username === FALSE)
		{
			return FALSE;
		}

		return ($password === $this->password($username));
    }
 
	/**
	 * Check if there is an active session. Optionally allows checking for a
	 * specific role.
	 *
	 * @param   string  $role  role name
	 * @return  mixed
	 */
    public function logged_in($role = NULL)
    {
		return ($this->get_user() !== NULL);
    }
    
    /**
     * Get currently logged in user ID
     * 
     * @return int User ID
     */
	public function get_user_id()
	{
		if($this->get_user() === NULL)
			return NULL;
		return $this->_session->get('auth_data')['id'];
	}
}
