<?php

    include("conecta.php");

    $bebida = $_POST['bebida'];
    $alcoolica = $_POST['alcoolica'];
    $tempoPreparo = $_POST['tempoPreparo'];
    $idTipoBebida = $_POST['idTipoBebida'];

    function insereBebida($conexao, $bebida, $alcoolica, $tempoPreparo, $idTipoBebida){

        $query = "insert into BEBIDA (BEBIDA, ALCOOLICA, TEMPO_PREPARO, ID_TIPO_BEBIDA)
                  values ({$bebida}, {$alcoolica}, {$tempoPreparo}, {$idTipoBebida});
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(insereBebida($conexao, $bebida, $alcoolica, $tempoPreparo, $idTipoBebida)){

        ?>

            <p class="text-success">A bebida <?= $bebida ?> foi adicionada com sucesso!</p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">A bebida <?= $bebida ?> não pôde ser adicionada: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>