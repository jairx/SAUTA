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

<form action="verifica-pedido.php" method="POST">
    
    Tipo de Prato:
        <?php selecionaTipoPrato($conexao) ?></br>
    Prato:
        <div id="prato"></div>   
   
    Quantidade:
        <input type="number" name="qtdPrato"></br>
    Observação:
        <textarea name="obsPrato"></br>
 <!--   Tipo de Bebida:
        <?php //selecionaTipoBebida($conexao) ?></br>
    Bebida:
        <?php //selecionaBebida($conexao) ?></br>
    Quantidade:
        <input type="number" name="qtdBebida"></br>
    Observação:
        <textarea name="obsBebida"></br>
    Mesa:
        <?php //selecionaMesa($conexao) ?></br> 
    Observações sobre o pedido:
        <input type="number" name="obsPedido"></br> --> 

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
    <button class="btn btn-success">Cadastrar</button>

</form>

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