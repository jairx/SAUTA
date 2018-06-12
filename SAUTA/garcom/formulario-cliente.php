 <?php include("../head.php"); ?>

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="../index-garcom.php">Home</a>
				<a class="nav-item nav-link" href="formulario-cliente.php">Cadastro<span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>

    <h1>Cadastro de Cliente</h1>

    <form action="cadastro-cliente.php" method="POST">
        
        Nome:
        <input type="text" name="nome"></br>
        CPF:
        <input type="number" name="cpf"></br>
        Data de Nascimento:
        <input type="date" name="data_nascimento"></br>
        E-mail:
        <input type="text" name="email"></br>
        Telefone:
        <input type="number" name="tel"></br>
        Celular:
        <input type="number" name="cel"></br>
        <button class="btn btn-success">Cadastrar</button>

    </form>

<?php
 if(isset($_GET['msg'])){
    
    $msg = $_GET['msg'];

    ?>
    <p class="text-danger"> <?= $msg ?> </p>
    <?php

 }

 ?>

<?php include("../footer.php"); ?>