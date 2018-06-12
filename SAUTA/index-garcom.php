<?php include("head.php"); ?>

	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="index-garcom.php">Home<span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="formulario-cliente.php">Cadastro</a>
			</div>
		</div>
	</nav>

	<h1>Tela de Garçom</h1></br></br></br></br>

	<h2>Atendimento</h2></br></br>

		<?php include("garcom/lista-atendimento.php"); ?>		

	<h2>Pedidos</h2></br></br>

		<?php include("garcom/lista-pedido-cozinha.php"); ?>

	<h2><a href="garcom/formulario-cliente.php">Cadastro de Clientes</a></h2></br></br>

	<h2>Pausa</h2></br></br>

		<?php include("garcom/formulario-pausa.php"); ?>

<script type="text/javascript">
	function Atualizar(){
		window.location.reload();
	}
</script>
<?php include("footer.php"); ?>