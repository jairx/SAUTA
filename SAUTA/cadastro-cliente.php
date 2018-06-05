<?php

    include("conecta.php");

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];

    function insereCliente($conexao, $nome, $cpf, $data_nascimento, $email, $tel, $cel) {

        $query = "insert into CLIENTE (CPF, NOME_CLIENTE, DATA_NASCIMENTO, EMAIL) 
                 values ({$cpf}, {$nome}, {$data_nascimento}, {$email});

                 select ID_CLIENTE 
                 into {$id_cliente} 
                 from CLIENTE 
                 where CPF = cpf;
                 
                 insert into TELEFONE (TELEFONE, ID_CLIENTE) values ({$tel}, {$id_cliente});

                 insert into TELEFONE (TELEFONE, ID_CLIENTE) values ({$cel}, {$id_cliente});";

        return = myqsli_query($conexao, $query);

    }

    if(insereCliente($conexao, $nome, $cpf, $data_nascimento, $email, $tel, $cel)){ 
        
        ?>
    
        <p class="text-success">O cliente <?= $nome ?> foi adicionado com sucesso.</p>

        <?php

    }
    else{ 

        $msg = mysqli_error($conexao);

        ?>

        <p class="text-danger">O cliente <?= $nome ?> não pôde ser adicionado: <?= $msg?></p>
    
        <?php 
    }

    mysqli_close($conexao);

?>