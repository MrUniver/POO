<?php 
/**
 * Charge automatiquement nos class
 */
namespace Strange\Config;
class Autoloader
{

	public static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	private static function autoload($class)
	{
	    $class = str_replace(["Strange", 'Config', 'Controllers', 'Composants'], "", $class);

		if (file_exists($class.'.php')) {
			require_once $class.'.php';
		}elseif(file_exists('Models\\'.$class.'.php')){
			require_once ROOT.'Models\\'.$class.'.php';
		}elseif(file_exists('Controllers\\'.$class.'.php')){
			require_once ROOT.'Controllers\\'.$class.'.php';
		}elseif(file_exists('Controllers\Composants\\'.$class.'.php')){
			require_once ROOT.'Controllers\Composants\\'.$class.'.php';
		}elseif(file_exists('Config\\'.$class.'.php')){
			require_once ROOT.'Config\\'.$class.'.php';
		}
		
	}
}