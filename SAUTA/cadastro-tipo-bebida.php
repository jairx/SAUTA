<?php

    include("conecta.php");

    $tipo_bebida = $_POST['tipo_bebida'];

    function insereTipoBebida($conexao, $tipo_bebida){

        $query = "insert into TIPO_BEBIDA (TIPO_BEBIDA)
                  values ({$tipo_bebida)}";

        return = mysqli_query($conexao, $query);

    }

    if(insereTipoBebida($conexao, $tipo_bebida)){

        ?>

            <p class="text-success">O tipo de bebida <?= $tipo_bebida ?> foi incluído com sucesso! </p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">O tipo de bebida <?= $tipo_bebida ?> não pôde ser adicionado: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>