<?php

    include("conecta.php");

    $prato = $_POST['prato'];
    $ingredientes = $_POST['ingredientes'];
    $tempoPreparo = $_POST['tempoPreparo'];
    $idTipoPrato = $_POST['idTipoPrato'];

    function inserePrato($conexao, $prato, $ingredientes, $tempoPreparo, $idTipoPrato){

        $query = "insert into PRATO (PRATO, INGREDIENTES, TEMPO_PREPARO, ID_TIPO_PRATO)
                  values ({$prato}, {$ingredientes}, {$tempoPreparo}, {$idTipoPrato});
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(inserePrato($conexao, $prato, $ingredientes, $tempoPreparo, $idTipoPreparo)){

        ?>

            <p class="text-success">O prato <?= $prato ?> foi adicionado com sucesso!</p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">O prato <?= $prato ?> não pôde ser adicionado: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>