<?php

$msg = "Favor preencher todos os campos.";

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

?>