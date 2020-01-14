<?php  
	if(!isset($view)) 
		die('404 Forbidden'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema de Reserva</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="<?= base_url_full; ?>css/style.css">
</head>
<body>
<header>
	<div class="center">
		<div class="logo">
			<h2><a href="<?= base_url; ?>">Glock</a></h2>
		</div><!--logo-->
		
		<nav class="menu">
			<ul>
				<li><a href="<?= base_url; ?>reserva">Reservas</a></li>
				<li><a href="#">Sobre</a></li>
				<li><a href="#">Contato</a></li>
			</ul>
		</nav><!--menu-->
		<div class="clear"></div><!--clear-->

	</div><!--center-->
</header>