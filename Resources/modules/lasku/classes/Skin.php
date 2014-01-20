<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Lasku skin support
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
class Skin {
	
	protected static $_skin = NULL;
	
	/**
	 * Get/set skin name
	 * 
	 * If the skin doesn't exist, the default base skin will be used.
	 * 
	 * @param string $skin Skin name. If not specified, it will act as getter.
	 *    To use default base skin, set FALSE here.
	 * @return string Skin name. FALSE if using default.
	 */
	public static function skin_name($skin = NULL)
	{
		// Getter
		if($skin === NULL) {
			if(Skin::$_skin === NULL) {
				$skin = Lasku::get_config('skin');
				if(trim($skin) == '' OR !is_dir(DOCROOT."skins/{$skin}")) {
					Skin::$_skin = FALSE;
				}
				else {
					Skin::$_skin = $skin;
				}
			}
		}
		
		// Setter
		else {
			if(trim($skin) == '' OR !is_dir(DOCROOT."skin/{$skin}")) {
				Skin::$_skin = FALSE;
				Lasku::set_config('skin', '');
			}
			else {
				Skin::$_skin = $skin;
				Lasku::set_config('skin', $skin);
			}
		}
		return Skin::$_skin;
	}
	
	/**
	 * Get skinned CSS file
	 * 
	 * Try to load specified CSS file from selected skin first. If not 
	 * exists, then the default CSS file will be used.
	 * 
	 * @param string $file CSS file. eg. "client/list"
	 * @return string Routed CSS file URI
	 * 
	 * @since 0.1.0
	 */
	public static function css($file)
	{
		$skin = Skin::skin_name();
		
		if($skin !== FALSE AND file_exists(DOCROOT."skins/{$skin}/css/{$file}.css")) {
			return URL::base()."skins/{$skin}/css/{$file}.css";
		}
		else {
			return URL::base()."static/css/{$file}.css";
		}
	}
	
	/**
	 * Get skinned JS file
	 * 
	 * Try to load specified JS file from selected skin first. If not 
	 * exists, then the default JS file will be used.
	 * 
	 * @param string $file JS file. eg. "client/list"
	 * @return string Routed JS file URI
	 * 
	 * @since 0.1.0
	 */
	public static function js($file)
	{
		$skin = Skin::skin_name();
		
		if($skin !== FALSE AND file_exists(DOCROOT."skins/{$skin}/js/{$file}.js")) {
			return URL::base()."skins/{$skin}/js/{$file}.js";
		}
		else {
			return URL::base()."static/js/{$file}.js";
		}
	}
}
