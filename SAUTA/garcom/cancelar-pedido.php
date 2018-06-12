<?php

include("../conecta.php");

$idPedido = $_POST['idPedido'];

function cancelaPedido($conexao, $idPedido){

    $query = "delete from PEDIDO where ID_PEDIDO = {$idPedido} and PRONTO = 0;";

    $query .= "select count(1) into {$countPrato} from PEDIDO_PRATO where ID_PEDIDO = {$idPedido};";

    if($countPrato == 1){

        $query .= "delete from PEDIDO_PRATO where ID_PEDIDO = {$idPedido};";

    }    

    $query .= "select count(1) into {$countBebida} from PEDIDO_BEBIDA where ID_PEDIDO = {$idPedido};";

    if($countBebida == 1){

        $query .= "delete from PEDIDO_BEBIDA where ID_BEBIDA = {$idBebida}";

    }    

    return mysqli_multi_query($conexao, $query);

}

if(cancelaPedido($conexao, $idPedido)){

    $cancelado = true;

    header('Location: ../index-garcom.php?cancelado=<?=$cancelado?>');

}
else{

    $msg = mysqli_error($conexao);

    ?>

        <p class="text-danger">Erro ao tentar cancelar pedido: <?= $msg ?></p>

    <?php

}


?>