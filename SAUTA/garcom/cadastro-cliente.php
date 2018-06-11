<?php

    include("../conecta.php");

    $msg = "Favor preencher todos os campos.";
    $countTel = 0;
    $countCel = 1;

    if(array_key_exists($_POST['nome'])){

        $nome = $_POST['nome'];

        if(array_key_exists($_POST['cpf'])){

            $cpf = $_POST['cpf'];

            if(array_key_exists($_POST['data_nascimento'])){

                $data_nascimento = $_POST['data_nascimento'];

                if(array_key_exists($_POST['email'])){

                    $email = $_POST['email'];

                }
                else{

                    header("Location: formulario-cliente.php?msg=<?php $msg ?>");

                }

            }
            else{

                header("Location: formulario-cliente.php?msg=<?php $msg ?>");

            }

        }
        else{

            header("Location: formulario-cliente.php?msg=<?php $msg ?>");

        }
    }
    else{

        header("Location: formulario-cliente.php?msg=<?php $msg ?>");

    };

    
    if(array_key_exists($_POST['tel'])){

        $tel = $_POST['tel'];
        $countTel = 1;

    };

    if(array_key_exists($_POST['cel'])){

        $cel = $_POST['cel'];
        $countCel = 1;

    };    

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

        <p class="text-danger">O cliente <?= $nome ?> não pôde ser adicionado: <?= $msg?> </p>
    
        <?php 
    }

    mysqli_close($conexao);

?>