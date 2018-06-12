<?php include("head.php"); 
	  include("conecta.php");
	  include("cozinheiro/lista-pedido.php");

$pedidos = listaPedido($conexao);
?>

	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="index-cozinheiro.php">Home<span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
		
	<h2>Pedidos</h2></br></br>
	<table class="table" onload="setTimeout('Atualizar()', 60000)">

		<tr>
			<td>Mesa</td>
			<td>Prato</td>
			<td>Quantidade</td>
			<td>Observação de Prato</td>
			<td>Bebida</td>
			<td>Quantidade</td>
			<td>Observação de Bebida</td>
			<td>Hora agendada</td>
			<td>Observação de Pedido</td>
		</tr>
		<tr>
			<?php foreach($pedidos as $pedido): ?>
				<td><?= $pedido['ID_MESA'] ?></td>
				<td><?= $pedido['PRATO'] ?></td>
				<td><?= $pedido['QTD_PRATO'] ?></td>
				<td><?= $pedido['OBS_PRATO'] ?></td>
				<td><?= $pedido['BEBIDA'] ?></td>
				<td><?= $pedido['QTD_BEBIDA'] ?></td>
				<td><?= $pedido['OBS_BEBIDA'] ?></td>
				<td><?= $pedido['HORARIO_AGENDAMENTO'] ?></td>
				<td><?= $pedido['OBS_PEDIDO'] ?></td>
				<td>
					<form action="cozinheiro/atendimento.php" method="POST">
						<input type="hidden" name="idPedido" value="<?= $pedido['ID_PEDIDO'] ?>">
						<button class="btn btn-success">Pronto</button>
					</form>
				</td>

			<?php endforeach ?>
		</tr>
	</table>

<?php
	if(isset($_GET['cozinhado'])){
		?>
		<p class="text-success">Pedido encaminhado para atendimento com sucesso!</p>
		<?php
	}
	if(isset($_GET['msg'])){
		?>
		<p class="text-danger">Houve um erro ao tentar transferir o pedido para atendimento: <?= $_GET['msg'] ?> </p>
		<?php
	}
?>

<script type="text/javascript">
	function Atualizar(){
		window.location.reload();
	}
</script>
<?php include("footer.php"); ?>