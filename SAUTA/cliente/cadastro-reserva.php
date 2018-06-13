<?php

    include("conecta.php");

    if(isset($_REQUEST['cpf'])){

        if(isset($_REQUEST['data'])){

            if(isset($_REQUEST['horario'])){

                if(isset($_REQUEST['numero_pessoas'])){

                    if(isset($_REQUEST['mesa'])){



                    }else{

                        $msg = "Preencha os campos corretamente!";

                        header('Location: formulario-reserva.php?error=<?=$msg?>');

                    }

                }else{

                    $msg = "Preencha os campos corretamente!";

                    header('Location: formulario-reserva.php?error=<?=$msg?>');

                }

            }else{

                $msg = "Preencha os campos corretamente!";

                header('Location: formulario-reserva.php?error=<?=$msg?>');

            }

        }else{

            $msg = "Preencha os campos corretamente!";

            header('Location: formulario-reserva.php?error=<?=$msg?>');

        }

    }else{

        $msg = "Preencha os campos corretamente!";

        header('Location: formulario-reserva.php?error=<?=$msg?>');

    }

    $cpf = $_REQUEST['cpf'];
    $data = $_REQUEST['data'];
    $horario = $_REQUEST['horario'];
    $numeroPessoas = $_REQUEST['numero_pessoas'];
    $mesa = $_REQUEST['mesa'];
    $idCliente = 0;

    function insereReserva($conexao, $data, $horario, $mesa, $cpf){

        $query = "select ID_CLIENTE
                  into {$idCliente}
                  from CLIENTE
                  where CPF = '{$cpf}';";

        $query .= "insert into RESERVA (DATA, HORARIO, ID_CLIENTE, ID_MESA)
                   values ('{$data}', '{$horario}', {$idCliente}, {$mesa}";

        return mysqli_query($conexao, $query);

    }

    if(insereReserva($conexao, $data, $horario, $mesa, $cpf)){

        header('Location: formulario-reserva.php/?success=1');

    }
    else{

        $msg = mysqli_error($conexao);

        header('Location: formulario-reserva.php?error=<?=$msg?>');

    }

    mysqli_close($conexao);

?>