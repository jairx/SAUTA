		<?php
		
		if(array_key_exists('check', $_POST)){
			$check = $_POST['check'];
		}
		else{
			$check = 0;
		};

		if ($check === 3347){
			?>
			<p>Check-out realizado com sucesso!</p>
			<?php
		}
		elseif($check === 3348){
			?>
			<p>Check-in realizado com sucesso!</p>
			<?php
        }
        elseif($check === 666){
            ?>
            <p>Erro de conexão.</p>
            <?php
        }
		else{
			?>
			<form action="cliente/cadastro-cliente-mesa.php" method="POST">

				CPF:
				<input type="number" name="cpf"></br>
				Mesa:
				<input type="number" name="mesa"></br>
				<input type="submit" value="Check-in/Check-out">

			</form>
			<?php
			if($check === 3349){
				?>
				<p>Usuário não encontrado. Favor refazer a operação!</p></br></br>
				<?php
			}
		}
		?>