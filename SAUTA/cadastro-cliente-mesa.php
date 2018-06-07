<?php

    include("conecta.php");

    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $idCliente = $_POST['idCliente'];
    $idMesa = $_POST['idMesa'];

    function insereReserva($conexao, $data, $horario, $idCliente, $idMesa){

        $query = "insert into CLIENTE_MESA (DATA, HORARIO, ID_CLIENTE, ID_MESA)
                  values ({$data}, {$horario}, {$idCliente}, {$idMesa};
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(insereReserva($conexao, $data, $horario, $idCliente, $idMesa)){

        ?>

            <p class="text-success">Você foi adicionado à mesa <?= $idMesa ?> com sucesso!</p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">Você não pôde ser adicionado à mesa <?= $idMesa ?>: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>