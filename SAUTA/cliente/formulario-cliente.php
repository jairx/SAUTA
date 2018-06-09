 <?php include("head.php"); ?>
 
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="../index.php">Home<span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>

    <h1>Cadastro de Cliente</h1>

    <form action="home.php" method="post">
        
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
        <input type="submit" value="Cadastrar">

    </form>

<?php include("footer.php"); ?>