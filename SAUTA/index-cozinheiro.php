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

	<div onload="setTimeout('Atualizar()', 60000)">
		<td>Pedidos</td>
		<tr>
				<td>Prato</td>
				<td>Quantidade</td>
				<td>Obs de Prato</td>
				<td>Bebida</td>
				<td>Quantidade</td>
				<td>Obs de Bebida</td>
				<td>Hora agendada</td>
				<td>Obs de Pedido</td>
			<?php foreach($pedidos as $pedido): ?>
				<td><?= $pedido['PRATO'] ?></td>
				<td><?= $pedido['QUANTIDADE'] ?></td>
				<td><?= $pedido['OBS_PRATO'] ?></td>
				<td><?= $pedido['BEBIDA'] ?></td>
				<td><?= $pedido['QUANTIDADE'] ?></td>
				<td><?= $pedido['OBS_BEBIDA'] ?></td>
				<td><?= $pedido['HORARIO_AGENDAMENTO'] ?></td>
				<td><?= $pedido['OBS_PEDIDO'] ?></td>
				<td>
					<form action="cozinheiro/atendimento.php" method="POST">
						<input type="hidden" name="id" value="<?= $pedido['ID_PEDIDO'] ?>">
						<button class="btn btn-danger">Pronto</button>
					</form>
				</td>

			<?php endforeach ?>
		</tr>
	</div>

<script type="text/javascript">
	function Atualizar(){
		window.location.reload();
	}
</script>
<?php include("footer.php"); ?>