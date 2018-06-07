<?php

    include("conecta.php");

    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $mesa = $_POST['mesa'];

    function insereReserva($conexao, $data, $horario, $mesa){

        $query = "insert into RESERVA (DATA, HORARIO, ID_CLIENTE)
                  values ({$data}, {$horario}, {$idCliente};

                  select max(ID_RESERVA)
                  into $idReserva
                  from RESERVA;
                  
                  insert into RESERVA_MESA (ID_CLIENTE, ID_RESERVA, ID_MESA)
                  values ({$idCliente}, {$idReserva}, {$idMesa}); 
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(insereReserva($conexao, $data, $horario, $mesa)){

        ?>

            <p class="text-success">Sua reserva foi efetuada com sucesso!</p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">Sua reserva não pôde ser concluída: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>