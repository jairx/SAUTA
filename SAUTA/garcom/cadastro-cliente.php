<?php

    include("../conecta.php");

    $countTel = 0;
    $countCel = 0;
    $id_cliente = 0;

    include("verifica-cliente.php");

    function insereCliente($conexao, $nome, $cpf, $data_nascimento, $email, $tel, $cel, $countTel, $countCel) {

        $query = "insert into CLIENTE (CPF, NOME_CLIENTE, DATA_NASCIMENTO, EMAIL) 
                 values ('{$cpf}', '{$nome}', '{$data_nascimento}', '{$email}');";
        
        $query .= "select ID_CLIENTE 
                into {$id_cliente} 
                from CLIENTE 
                where CPF = {$cpf};";
            
        if($countTel===1){

            $query .= "insert into TELEFONE (TELEFONE, ID_CLIENTE) values ('{$tel}', {$id_cliente});";

        }

        if($countCel===1){

            $query .= "insert into TELEFONE (TELEFONE, ID_CLIENTE) values ('{$cel}', {$id_cliente})";

        }

        return myqsli_multi_query($conexao, $query);

    }  

    if(insereCliente($conexao, $nome, $cpf, $data_nascimento, $email, $tel, $cel, $countTel, $countCel)){ 
        
        ?>
    
        <p class="text-success">O cliente <?= $nome ?> foi adicionado com sucesso.</p>

        <?php

    }
    else{ 

        $msg = mysqli_error($conexao);

        ?>

        <p class="text-danger">O cliente <?= $nome ?> não pôde ser adicionado: <?= $msg?> </p>
    
        <?php 
    }

    mysqli_close($conexao);

?>