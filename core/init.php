<?php 
	
	session_start();

	defined('S') ? null : define('S',DIRECTORY_SEPARATOR);
	define('SITE_ROOT','C:'.S.'xampp'.S.'htdocs'.S.'galery');


	$GLOBALS['config'] = array(
		'mysql' => array(
			'host' => '127.0.0.1',
			'user' => 'root',
			'password' => '',
			'db'	=> 'galery'
		),
		'session' => array(
			'session_name' => 'user'
		)
	);

	spl_autoload_register(function($class){

		require_once('classess/'.$class.'.php');
	});



 ?>