<?php include("../head.php");?>

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

      <form action="cadastro-reserva.php">

      <table class="table">
            
            <tr>
                  <td>CPF:</td>
                  <td><input type="number" name="cpf"></td>
            </tr>
            <tr>
                  <td>Data:</td>
                  <td><input type="date" name="data"></td>
            </tr>
            <tr>
                  <td>Horário: </td>
                  <td><input type="time" name="horario"></td>
            </tr>
            <tr>
                  <td>Número de pessoas:</td>
                  <td><input type="number" name="numero_pessoas"></td>
            </tr>
            <tr>
                  <td>Mesa:</td>
                  <td>

                        <?php

                              include("lista-mesa.php");

                        ?>

                  </td>
            </tr>

            <tr><td><button class="btn btn-success">Reservar</button></td></tr>
      </table>
      
      </form>

      <?php

      if(isset($_REQUEST['success'])){

            ?>

                  <p class="text-success">Sua reserva foi efetuada com sucesso!</p>

            <?php

      }

      if(isset($_REQUEST['error'])){

            ?>

            <p class="text-danger">Sua reserva não pôde ser efetuada: <?=$_REQUEST['error']?></p>

            <?php

      }

      ?>

<?php include("../footer.php"); ?>