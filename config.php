<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
		die('404 Forbidden');

	session_start();

	date_default_timezone_set('America/Sao_Paulo');

	$autoload = function($class) {
	$class    = str_replace('\\', '/', $class);
	
		if(file_exists('Application/'.$class.'.php'))
			require('Application/'.$class.'.php');
			require_once('Application/MySql.php');
	};

	spl_autoload_register($autoload);

	define('DB', array('host' => 'localhost', 'dbname' => 'sistema_reserva', 'user' => 'root', 'pass' => ''));
	define('base_url', 'http://localhost:8080/sistema_reserva/');
	define('base_url_full', 'http://localhost:8080/sistema_reserva/Application/assets/');
?>