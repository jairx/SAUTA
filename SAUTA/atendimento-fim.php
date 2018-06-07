<?php

    include("conecta.php");

    $idAtendimento = $_POST['idAtendimento'];
    $horario = $_POST['horario'];

    function insereFimAtendimento($conexao, $idAtendimento, $horario){

        $query = "UPDATE ATENDIMENTO
                  set FIM = {$horario}
                  where ID_ATENDIMENTO = {$idAtendimento};
                  
                  select ID_GARCOM
                  into {$idGarcom}
                  from ATENDIMENTO
                  where ID_ATENDIMENTO = {$idAtendimento};

                  insert into DISPONIBILIDADE (INICIO, ID_GARCOM)
                  values ({$horario}, {$idGarcom});                  
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(insereFimAtendimento($conexao, $idAtendimento, $horario)){

        ?>

            <p class="text-success">O seu atendimento foi finalizado com sucesso! </p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">Houve um erro ao tentar finalizar seu atendimento: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>