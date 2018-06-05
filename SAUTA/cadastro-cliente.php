<?php

    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $data_nascimento = $_GET['data_nascimento'];
    $email = $_GET['email'];
    $tel = $_GET['tel'];
    $cel = $_GET['cel'];

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

    $conexao = mysqli_connect('localhost', 'root', '', 'SAUTA');

    if(insereCliente($conexao, $nome, $cpf, $data_nascimento, $email, $tel, $cel)){ ?>
    
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