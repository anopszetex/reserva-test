<?php 
	include('config.php');

	$homeController = new \controllers\homeController();
	
	Router::get('/', function() use ($homeController) {
		$homeController->index();
	});

	Router::get('/reserva', function() use($homeController) {
		$homeController->reservas();
	});

	if(Router::isExecuted() == false)
		die('Página não encontrada :(');
?>