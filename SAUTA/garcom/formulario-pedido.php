<?php include("../head.php"); 
      include("../conecta.php");

?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="../index-garcom.php">Home</a>
            <a class="nav-item nav-link" href="formulario-cliente.php"><span class="">Cadastro</span></a>
        </div>
    </div>
</nav>

<?php include("lista-prato-bebida-mesa.php"); ?>

<h1>Cadastro de Pedido</h1>

    <table class="table">

        <form action="verifica-pedido.php" method="POST">
    
        <tr>
            <td>Tipo de Prato:</td>
            <td><?php selecionaTipoPrato($conexao) ?>
        </tr>
        <tr>
            <td>Prato:</td>
            <td id="prato"></td>
        </tr>
        <tr>
            <td>Quantidade:</td>
            <td><input type="number" name="qtdPrato"></td>
        </tr>
        <tr>
            <td>Observação:</td>
            <td><input type="text" name="obsPrato"></td>
        </tr>
        <tr>
            <td>Tipo de Bebida:</td>
            <td><?php selecionaTipoBebida($conexao) ?></td>
        </tr>
        <tr>
            <td>Bebida:</td>
            <td id="bebida"></td>
        </tr>
        <tr>
            <td>Quantidade:</td>
            <td><input type="number" name="qtdBebida"></td>
        </tr>
        <tr>
            <td>Observação:</td>
            <td><input type="text" name="obsBebida"></td>
        </tr>
        <tr>
            <td>Mesa:</td>
            <td><?php selecionaMesa($conexao) ?></td>
        </tr>
        <tr>
            <td>Observações sobre o pedido:</td>
            <td><input type="text" name="obsPedido"></td>

        </tr> 

        <?php

            if(isset($_GET['garcomNovoPedido'])){

                ?>

                    <input type="hidden" name="garcomNovoPedido" value="227">

                <?php

            }
            if(isset($_GET['gerenteNovoPedido'])){

                ?>

                    <input type="hidden" name="gerenteNovoPedido" value="247">

                <?php

            }

        ?>
        <tr><td><button class="btn btn-success">Cadastrar</button></td></tr>

        </form>

    </table>

<?php

if(isset($_GET['msg'])){

    $msg = $_GET['msg'];

    ?>

    <p class="text-danger">Erro ao cadastrar pedido: <?= $msg ?> </p>

    <?php

}
if(isset($_GET['msgSuccess'])){

    $msg = $_GET['msgSuccess'];

    ?>

    <p class="text-success"> Pedido cadastrado com sucesso!</p>

    <?php

}
if(isset($_GET['incompleto'])){

    ?>

        <p class="text-danger">Favor preencher os campos corretamente.</p>

    <?php

}

include("../footer.php"); ?>