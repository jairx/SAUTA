<?php

function terminaPausa($conexao, $data, $hora, $idGarcom){

    $query =  "update INTERRUPCOES_JORNADA
               set DATA_FIM = '{$data}', FIM = '{$hora}', 
               where ID_GARCOM = {$idGarcom}
               and FIM is null;";

    $query .= "insert into DISPONIBILIDADE (DATA_INICIO, INICIO, ID_GARCOM)
               values ('{$data}', '{$hora}', {$idGarcom})";

    return mysqli_multi_query($conexao, $query);

}

if(terminaPausa($conexao, $data, $hora, $idGarcom)){

    header("Location: ../index-garcom.php");

}
else{

    $msg = mysqli_error($conexao);

    ?>

        <p class="text-danger">A operação de controle de pausa não pôde ser realizada.</br></br> <?= $msg ?> </p>

    <?php

}

?>