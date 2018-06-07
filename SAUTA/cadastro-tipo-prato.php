<?php

    include("conecta.php");

    $tipo_prato = $_POST['tipo_prato'];

    function insereTipoPrato($conexao, $tipo_prato){

        $query = "insert into TIPO_PRATO (TIPO_PRATO)
                  values ({$tipo_prato)}";

        return = mysqli_query($conexao, $query);

    }

    if(insereTipoPrato($conexao, $tipo_prato)){

        ?>

            <p class="text-success">O tipo de prato <?= $tipo_prato ?> foi incluído com sucesso! </p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">O tipo de prato <?= $tipo_prato ?> não pôde ser adicionado: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>