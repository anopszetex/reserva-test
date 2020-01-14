<?php  
	if(!isset($view)) 
		die('404 Forbidden');

	$infoReserva = $arr['model']->select('tb_agenda', true);
?>

<section class="agendamentos">
	<div class="center">
		<?php 
			foreach($infoReserva as $key => $value) { 
				if(strtotime($value['horario']) > time()) {
		?>
		<div class="box-single-horario">
			<div class="box-single-wraper">
				Nome: <?= $value['nome'].'<br/>'; ?>
				Data e Horário: <?= date('d/m/Y H:i', strtotime($value['horario'])); ?>
			</div><!--box-single-wraper-->
		</div><!--box-single-horario-->
		<?php } } ?>
		<div class="clear"></div><!--clear-->
	</div><!--agendamentos-->
</section>

</body>
</html>
