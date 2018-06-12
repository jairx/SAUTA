<?php

    include("../conecta.php");

    $countTel = 0;
    $countCel = 0;
    $id_cliente = 0;
    $tel = null;
    $cel = null;

    include("verifica-cliente.php");

    function insereCliente($conexao, $nome, $cpf, $data_nascimento, $email) {

        $query = "insert into CLIENTE (CPF, NOME_CLIENTE, DATA_NASCIMENTO, EMAIL) 
                 values ('{$cpf}', '{$nome}', '{$data_nascimento}', '{$email}');";

        return mysqli_query($conexao, $query);

    }  

    function getID($conexao, $cpf){

        $query = "select ID_CLIENTE
                  from CLIENTE
                  where CPF = {$cpf}";

        $resultado = mysqli_query($conexao, $query);

        $row = mysqli_fetch_assoc($resultado);

        return $row['ID_CLIENTE'];

    }
 
    function insereTel($conexao, $countTel, $countCel, $tel, $cel, $idCliente){

        if($countTel==1){

            $query = "insert into TELEFONE (TELEFONE, ID_CLIENTE) values ('{$tel}', {$idCliente});";

        }
        else{

            $query = "";

        }

        if($countCel==1){

            $query .= "insert into TELEFONE (TELEFONE, ID_CLIENTE) values ('{$cel}', {$idCliente})";

        }

        return mysqli_multi_query($conexao, $query);

    }

    if(insereCliente($conexao, $nome, $cpf, $data_nascimento, $email)){ 
        
        if ($idCliente = getID($conexao, $cpf)){

            if(insereTel($conexao, $countTel, $countCel, $tel, $cel, $idCliente)){

                ?>
    
                <p class="text-success">O cliente <?= $nome ?> foi adicionado com sucesso.</p>
        
                <?php

            }
            else{

                $msg = mysqli_error($conexao);

                ?>
    
                <p class="text-danger">O cliente <?= nome ?> foi adicionado com sucesso, porém os telefones de contato não:
                <?= $msg ?> </p>
    
                <?php

            }

        }
        else{

            $msg = mysqli_error($conexao);

            ?>

            <p class="text-danger">O cliente <?= nome ?> foi adicionado com sucesso, porém os telefones de contato não:
            <?= $msg ?> </p>

            <?php

        }

    }
    else{ 

        $msg = mysqli_error($conexao);

        ?>

        <p class="text-danger">O cliente <?= $nome ?> não pôde ser adicionado: <?= $msg?> </p>
    
        <?php 
    }

    mysqli_close($conexao);

?>