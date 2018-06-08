<?php

    include("conecta.php");

    $nomePausa = $_POST['nomePausa'];

    function insereTipoPausa($conexao, $nomePausa){

        $query = "insert into TIPO_PAUSA (NOME_PAUSA)
                  values ({$nomePausa)}";

        return = mysqli_query($conexao, $query);

    }

    if(insereTipoPausa($conexao, $nomePausa)){

        ?>

            <p class="text-success">O tipo de pausa <?= $nomePausa ?> foi incluído com sucesso! </p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">O tipo de pausa <?= $nomePausa ?> não pôde ser adicionado: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>