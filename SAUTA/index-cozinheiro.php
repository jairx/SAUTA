<?php include("head.php"); 

$pedidos = listaPedido($conexao);
?>

	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="index-cozinheiro.php">Home<span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="sobre.php">Sobre</a>
				<a class="nav-item nav-link" href="contato.php">Contato</a>
				<a class="nav-item nav-link" href="logout.php">Logout</a>
			</div>
		</div>
	</nav>

	<td>Pedidos</td>
	<td>
		<?php foreach($pedidos as $pedido): ?>
			<?= $pedido ?>
			<input type="submit" value="<?= $pedido['ID_PEDIDO'] ?>"

		<?php endforeach ?>

<?php include("footer.php"); ?>