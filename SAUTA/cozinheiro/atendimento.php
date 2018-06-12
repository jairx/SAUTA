<?php

    include("../conecta.php");
    include("../data-hora.php");

    $idPedido = $_POST['idPedido'];

    function insereAtendimento($conexao, $data, $hora, $idPedido, $idGarcom){

        $query = "update PEDIDO
                  set DATA_FIM = {$data}, HORARIO_FIM = {$hora}, PRONTO = 1, ID_GARCOM = {$idGarcom}
                  where ID_PEDIDO = {$idPedido}";

        return mysqli_query($conexao, $query);

    }

    include("seleciona-garcom.php");

    if(insereAtendimento($conexao, $data, $hora, $idPedido, $idGarcom)){

        $cozinhado = 1;

        header('Location: ../index-cozinheiro.php?cozinhado=<?=$cozinhado?>');

    }
    else{

        $msg = mysqli_error($conexao);

        header('Location: ../index-cozinheiro.php?msg=<?=$msg?>');

    }

    mysqli_close($conexao); 
