<?php

    include("../conecta.php");
    include("../data-hora.php");

    $idPedido = $_POST['idPedido'];
    $idGarcom = $_POST['idGarcom'];

    function insereFimAtendimento($conexao, $hora, $idPedido, $idGarcom, $data){

        $query = "update PEDIDO set ATENDIDO = '{$hora}' where ID_PEDIDO = {$idPedido};";

        $query .= "insert into DISPONIBILIDADE (DATA_INICIO, INICIO, ID_GARCOM) values ({$data}, {$hora}, {$idGarcom})";

        return mysqli_multi_query($conexao, $query);

    }

    if(insereFimAtendimento($conexao, $hora, $idPedido, $idGarcom, $data)){

            header("Location: ../index-garcom.php");

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">Houve um erro ao tentar finalizar seu atendimento.</br></br> <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>