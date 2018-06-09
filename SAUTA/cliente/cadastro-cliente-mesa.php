<?php

    include("conecta.php");

    $cpf = $_POST['cpf'];
    $mesa = $_POST['mesa'];

    function insereCheckin($conexao, $cpf, $mesa, $idCliente){

        include("../getdate.php");
        include("../gettime.php");
        
        $query = "insert into CLIENTE_MESA (DATA, HORARIO, ID_CLIENTE, ID_MESA)
                  values ({$data}, {$horario}, {$idCliente}, {$mesa}
                  ";

        return = mysqli_query($conexao, $query);

    }

    function verificaCheck($conexao, $cpf){

        $query = "select count(1)
                  from CLIENTE
                  where CPF = {$cpf}";

        $query2 = "select ID_CLIENTE
                   from CLIENTE
                   where CPF = {$cpf}";

        $query3 = "select count(1)
                   from CLIENTE_MESA
                   where ID_CLIENTE = {$idCliente}";
        
        $query4 = "delete from CLIENTE_MESA
                   where ID_CLIENTE = {$idCliente};";

        if (($isThere = mysqli_query($conexao, $query))){
            if($isThere===1){
                if(($idCliente = mysqli_query($conexao, $query2))){
                    if(($contador = mysqli_query($conexao, $query3))){
                        if($contador===1){
                            if(mysqli_query($conexao, $query4)){
                                header("Location: ../index.php?check=3347");
                            }
                            else{
                                $msg = mysqli_error($conexao);
                                header("Location: ../index.php?check=666&msg=<?=$msg?>");
                            }
                        }
                        else{
                            if(insereCheckin($conexao, $cpf, $mesa, $idCliente)){
                                header("Location: ../index.php?check=3348");
                            }
                            else{
                                $msg = mysqli_error($conexao);
                                header("Location: ../index.php?check=666&msg=<?=$msg?>");
                            }
                        }
                    }
                }
            }
            else{

                header("Location: ../index.php?check=3349");

            }
            
        }

    mysqli_close($conexao);

?>