<?php

    include("conecta.php");

    $nome_garcom = $_POST['nome_garcom'];
    $endereco_foto = $_POST['endereco_foto'];

    function insereGarcom($conexao, $nome_garcom, $endereco_foto) {

        $query = "insert into GARCOM (ENDERECO_FOTO, NOME_GARCOM) 
                 values ({$endereco_foto}, {$nome_garcom});";

        return = myqsli_query($conexao, $query);

    }  

    if(insereCliente($conexao, $nome_garcom, $endereco_foto)){ 
        
        ?>
    
        <p class="text-success">O garçom <?= $nome_garcom ?> foi adicionado com sucesso.</p>

        <?php

    }
    else{ 

        $msg = mysqli_error($conexao);

        ?>

        <p class="text-danger">O garçom <?= $nome_garcom ?> não pôde ser adicionado: <?= $msg?> </p>
    
        <?php 
    }

    mysqli_close($conexao);

?>