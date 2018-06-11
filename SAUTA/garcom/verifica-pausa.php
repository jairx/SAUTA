<?php

    include("conecta.php");
    include("../data-hora.php");

    $idGarcom = $_POST['garcom'];
    $idTipoPausa = $_POST['tipo_pausa'];

    function verificaPausa($conexao, $idGarcom, $idTipoPausa){

        $query = "select count(1)
                  from INTERRUPCOES_JORNADA
                  where ID_GARCOM = {$idGarcom}
                  and FIM is null;
                 ";
    
        return mysqli_query($conexao, $query);
    
    }

    if(($count = verificaPausa($conexao, $idGarcom, $idTipoPausa))){

        if($count=0){

            include("inicia-pausa.php");

        }
        else{

            include("termina-pausa.php");

        }

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">A operação de controle de pausa não pôde ser realizada.</br></br> <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>