 <?php include("head.php"); ?>
 
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

<?php include("footer.php"); ?>