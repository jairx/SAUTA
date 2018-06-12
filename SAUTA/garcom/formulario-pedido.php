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
    
    Tipo de Prato:
    <select name="tipo_prato" value="">
    </select>
    </br>
    Prato:
    <select name="prato" value=""></br>
    Quantidade:
    <input type="number" name="quantidade_prato"></br>
    Observação:
    <textarea name="observacao_prato"></br>
    Tipo de Bebida:
    <input type="date" name="data_nascimento"></br>
    Bebida:
    <input type="text" name="email"></br>
    Quantidade:
    <input type="number" name="quantidade_bebida"></br>
    Observação:
    <textarea name="observacao_bebida"></br>
    CPF:
    <input type="number" name="tel"></br>
    MESA:
    <input type="number" name="cel"></br>
    <button class="btn btn-success">Cadastrar</button>

</form>

<?php
if(array_key_exists($_GET['msg'])){

$msg = $_GET['msg'];

?>
<p class="text-danger"> <?= $msg ?> </p>
<?php

}

include("../footer.php"); ?>