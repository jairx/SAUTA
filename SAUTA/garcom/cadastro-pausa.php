<?php

    include("conecta.php");

    $data = $_POST['data'];
    $inicio = $_POST['inicio'];
    $fim = $_POST['fim'];
    $idTipoPausa = $_POST['idTipoPausa'];
    $idGarcom = $_POST['idGarcom'];
    $nomePausa;

    function inserePausa($conexao, $data, $inicio, $fim, $idTipoPausa, $idGarcom){

        $query = "insert into INTERRUPCOES_JORNADA (DATA, INICIO, FIM, TIPO_PAUSA, ID_GARCOM)
                  values ({$data}, {$inicio}, {$fim}, {$idTipoPausa}, {$idGarcom});
                  
                  select NOME_PAUSA
                  into $nomePausa
                  from TIPO_PAUSA
                  where ID_TIPO_PAUSA = $idTipoPausa;                  
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(inserePausa($conexao, $data, $inicio, $fim, $idTipoPausa, $idGarcom)){

        ?>

            <p class="text-success">O tipo de pausa <?= $nomePausa ?> foi incluído com sucesso! </p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">O tipo de pausa <?= $nomePausa ?> não pôde ser adicionado: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>