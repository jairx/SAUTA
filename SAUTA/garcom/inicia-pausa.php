<?php

function inserePausa($conexao, $data, $hora, $idGarcom, $idTipoPausa){

    $query =  "insert into INTERRUPCOES_JORNADA (DATA, INICIO, ID_TIPO_PAUSA, ID_GARCOM)
               values ('{$data}', '{$hora}', {$idTipoPausa}, {$idGarcom});";
              
    $query .= "update DISPONIBILIDADE
               set DATA_FIM = '{$data}', FIM = '{$hora}'
               where ID_GARCOM = {$idGarcom}
               and FIM is null";

    return mysqli_multi_query($conexao, $query);

}

if(inserePausa($conexao, $data, $hora, $idGarcom, $idTipoPausa)){

    header("Location: ../index-garcom.php");

}
else{

    $msg = mysqli_error($conexao);

    ?>

        <p class="text-danger">A operação de controle de pausa não pôde ser realizada.</br></br> <?= $msg ?> </p>

    <?php

}

?>