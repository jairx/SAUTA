<?php

include("../conecta.php");
include("../data-hora.php");

function cadastraPedido($conexao, $idMesa, $idTipoPrato, $idPrato, $qtdPrato, $obsPrato, $idTipoBebida, $idBebida, $qtdBebida, $obsBebida, $obsPedido, $data, $hora, $horarioAgendamento){

    $query = "select ID_CLIENTE_MESA
              into {$idClienteMesa}
              from CLIENTE_MESA
              where ID_MESA = {$idMesa}
              and HORARIO_FIM is null;";

    $query .= "insert into PEDIDO (DATA, HORARIO, HORARIO_AGENDAMENTO, OBSERVACAO, ID_CLIENTE_MESA)
               values('{$data}', '{$hora}', '{$horarioAgendamento}', '{$obsPedido}', {$idClienteMesa});";

    $query .= "select max(ID_PEDIDO)
               into {$idPedido}
               from PEDIDO;";

    if(!(is_null($idTipoPrato)){

        $query .= "insert into PEDIDO_PRATO (QUANTIDADE, OBSERVACAO, ID_PEDIDO, ID_PRATO)
                   values ({$qtdPrato}, '{$obsPrato}', {$idPedido}, {$idPrato});";

    }

    if(!(is_null($idTipoBebida)){

        $query .= "insert into PEDIDO_BEBIDA (QUANTIDADE, OBSERVACAO, ID_PEDIDO, ID_BEBIDA)
                   values ({$qtdBebida}, '{$obsBebida}', {$idPedido}, {$idBebida});";

    }

    return mysqli_multi_query($conexao, $query);

}

$horarioAgendamento = date('H:i:s', time());

if(cadastraPedido($conexao, $idMesa, $idTipoPrato, $idPrato, $qtdPrato, $obsPrato, $idTipoBebida, $idBebida, $qtdBebida, $obsBebida, $obsPedido, $data, $hora, $horarioAgendamento)){

    $msgSuccess = 1;

    if($pg == 227){

        header('Location: formulario-pedido.php?msgSuccess=<?=$msgSuccess?>&pg=<?=$pg?>');

    }
    elseif($pg == 247){

        header('Location: formulario-pedido.php?msgSuccess=<?=$msgSuccess?>&pg=<?=$pg?>');

    }
    else{

        header('Location: formulario-pedido.php?msgSuccess=<?=$msgSuccess?>');

    }    

}
else{

    $msg = mysqli_error($conexao);

    if($pg==227){

        header('Location: formulario-pedido.php?msg=<?=$msg?>&pg=<?=$pg?>');

    }
    elseif($pg==247){

        header('Location: formulario-pedido.php?msg=<?=$msg?>&pg=<?=$pg?>');

    }
    else{

        header('Location: formulario-pedido.php?msg=<?=$msg?>');

    }    

}

?>