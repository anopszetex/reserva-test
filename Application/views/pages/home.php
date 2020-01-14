<?php  
	if(!isset($view)) 
		die('404 Forbidden');
?>

<section class="reserva">
	<div class="center">
		<form method="post">
			<?php
				if(isset($_POST['acao'])) {  
					(isset($_SESSION['sucesso']) && $_SESSION['sucesso'] === true) ?
						$arr['model']->boxAlert('sucesso', $_SESSION['boxMensagem']) : $arr['model']->boxAlert('erro', $_SESSION['boxMensagem']);
				}
			?>
			<label>Escolha um horário: </label>
			<input type="text" name="nome" placeholder="Seu nome">
			<select name="dataHora">
				<?php  
					for($x = 0; $x <= 23; $x++) {
						$hora = $x;
						if($x < 10)
							$hora = '0'.$hora;

						$hora     .= ':00:00';
						$verifica  = date('Y-m-d').' '.$hora;
						$stmt 	   = $arr['model']->select('tb_agenda', true, 'horario = ?', array($verifica));
						if(count($stmt) == 0 && strtotime($verifica) > time()) {
							$dataHora = date('d/m/Y'). ' '.$hora;
							echo '<option value="'.$dataHora.'">'.$dataHora.'</option>';
						}
					}
				?>
			</select>
			<input type="submit" name="acao" value="Enviar">
		</form>
	</div><!--center-->
</section><!--reserva-->
