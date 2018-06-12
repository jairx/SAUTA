<?php

$msg = "Favor preencher todos os campos.";

if(isset($_POST['nome'])){

    $nome = $_POST['nome'];

    if(isset($_POST['cpf'])){

        $cpf = $_POST['cpf'];

        if(isset($_POST['data_nascimento'])){

            $data_nascimento = $_POST['data_nascimento'];

            if(isset($_POST['email'])){

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


if(isset($_POST['tel'])){

    if($_POST['tel'] != null){

        $tel = $_POST['tel'];
        $countTel = 1;

    }

};

if(isset($_POST['cel'])){

    if($_POST['cel'] != null){

        $cel = $_POST['cel'];
        $countCel = 1;

    }

};

?>