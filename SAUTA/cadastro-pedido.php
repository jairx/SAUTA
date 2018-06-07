<?php

    include("conecta.php");

    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $horarioAgendamento = $_POST['horarioAgendamento'];
    $observacao = $_POST['observacao'];
    $idClienteMesa = $_POST['idClienteMesa'];

    function inserePedido($conexao, $data, $horario, $horarioAgendamento, $observacao, $idClienteMesa){

        $query = "insert into PEDIDO (DATA, HORARIO, HORARIO_AGENDAMENTO, OBSERVACAO, ID_CLIENTE_MESA)
                  values ({$data}, {$horario}, {$horarioAgendamento}, {$observacao}, {$idClienteMesa});

                  insert into PEDIDO_PRATO (QUANTIDADE, OBSERVACAO, ID_PEDIDO, ID_PRATO)

                  insert into PEDIDO_BEBIDA (QUANTIDADE, OBSERVACAO, ID_PEDIDO, ID_BEBIDA)
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(inserePedido($conexao, $data, $horario, $horarioAgendamento, $observacao, $idClienteMesa)){

        ?>

            <p class="text-success">O seu pedido foi adicionado com sucesso!</p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">O seu pedido não pôde ser adicionado: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>