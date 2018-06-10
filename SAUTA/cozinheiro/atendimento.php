<?php

    include("conecta.php");
    include("../data-hora.php");
    include("seleciona-garcom.php");

    $idPedido = $_POST['id'];

    function insereAtendimento($conexao, $inicio, $idPedido, $idGarcom){

        $query = "insert into ATENDIMENTO (INICIO, ID_PEDIDO, ID_GARCOM)
                  values ({$inicio}, {$idPedido}, {$idGarcom});
                  
                  update DISPONIBILIDADE
                  set FIM = {$inicio}
                  where ID_GARCOM = {$idGarcom}
                  and FIM = 'null';
                  ";
                  
        $query2 = "
                  ";

        return mysqli_query($conexao, $query);

    }

    if(insereAtendimento($conexao, $hora, $idPedido, $idGarcom)){

        ?>

            <p class="text-success">O seu pedido está para ser atendido! </p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">Houve um erro ao tentar transferir seu pedido para atendimento: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>