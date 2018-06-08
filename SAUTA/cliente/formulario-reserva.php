<?php include("head.php"); ?>

      <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="formulario-cliente.php">Cadastro</a>
				<a class="nav-item nav-link" href="sobre.php"?id="<?=10;?>">Sobre</a>
				<a class="nav-item nav-link" href="contato.php">Contato</a>
			</div>
		</div>
	</nav>

      <h1>Cadastro de Reserva</h1>

      <form action="home.php">

            CPF:
            <input type="number" name="cpf"></br>	
            Data:
            <input type="date" name="data"></br>
            Horário: 
            <input type="time" name="horario"></br>
            Número de pessoas:
            <input type="number" name="numero_pessoas"></br>
            Mesa:
            <input type="number" name="mesa"></br>
            <input type="submit" value="Reservar">
      
      </form>

<?php include("footer.php"); ?>