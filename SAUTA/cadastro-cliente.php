<?php

    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $data_nascimento = $_GET['data_nascimento'];
    $email = $_GET['email'];
    $tel = $_GET['tel'];
    $cel = $_GET['cel'];

    $conexao = mysqli_connect('localhost', 'root', '', 'SAUTA');

    $query = "insert into CLIENTE (CPF, NOME_CLIENTE, DATA_NASCIMENTO, EMAIL) values ({$cpf}, {$nome}, {$data_nascimento}, {$email})";

    $query = "select ID_CLIENTE into {$id_cliente} from CLIENTE where CPF = cpf";

    $query = "insert into TELEFONE (TELEFONE, ID_CLIENTE) values ({$tel}, {$id_cliente})";

    $query = "insert into TELEFONE (TELEFONE, ID_CLIENTE) values ({$cel}, {$id_cliente});

    if(mysqli_query($conexao, $query)){ ?>
    
        <p class="alert-success">O cliente <?= $nome ?> foi adicionado com sucesso.</p>
        <?php

    }
    else{ ?>

        <p class="alert-danger">O cliente <?= $nome ?> não pôde ser adicionado.</p>
    
    <?php }

    mysqli_close($conexao);

?>