<?php
namespace Strange\Config;


abstract class Config{

	private static $config = array(
		'title' 	=>"Mon super site",
		'Model' => array(
			'dbhost'	=> "localhost",
			'dbname'	=> "test",
			'dbuser'	=> "root",
			'dbpass'	=> "",
		),
		'css'		=> "css/",
		'js'		=> "js/",
		'font'		=> "font/",
	);

	public static function getKey($key)
	{
		if (array_key_exists($key, self::$config)) {
			return self::$config[$key];	
		}
		return false;
	}

}