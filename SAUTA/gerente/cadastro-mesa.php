<?php

    include("conecta.php");

    $numero_lugares = $_POST['numero_lugares'];
    $mesa;

    function insereMesa($conexao, $numero_lugares){

        $query = "insert into MESA (NUMERO_LUGARES)
                  values ({$numero_lugares)};
                  
                  select max(ID_MESA)
                  into $mesa
                  from MESA;
                  ";

        return = mysqli_query($conexao, $query);

    }

    if(insereMesa($conexao, $numero_lugares)){

        ?>

            <p class="text-success">A mesa <?= $mesa ?> foi incluída com sucesso! </p>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">A mesa <?= $mesa ?> não pôde ser adicionada: <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>