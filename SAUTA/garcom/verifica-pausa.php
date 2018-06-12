<?php

    include("conecta.php");
    include("../data-hora.php");

    $idGarcom = $_POST['garcom'];
    $idTipoPausa = $_POST['tipo_pausa'];

    function verificaPausa($conexao, $idGarcom){

        $query = "select count(1)
                  from INTERRUPCOES_JORNADA
                  where ID_GARCOM = {$idGarcom}
                  and FIM is null";
    
        return mysqli_query($conexao, $query);
    
    }

    function verificaTipoPausa($conexao, $idGarcom){

        $query = "select ID_TIPO_PAUSA
                  from INTERRUPCOES_JORNADA
                  where ID_GARCOM = {$idGarcom}
                  and FIM is null";

        return mysqli_query($conexao, $query);

    }

    if(($count = verificaPausa($conexao, $idGarcom))){

        if($count=1){
            
            if(($idTipo = verificaTipoPausa($conexao, $idGarcom))){

                if($idTipo===$idGarcom){

                    include("termina-pausa.php");

                }
                else{

                    ?>

                        <p class="text-danger">O tipo de pausa selecionada está incorreto.</p>

                    <?php

                }      

            }
            else{

                $msg = mysqli_error($conexao);

                ?>
        
                    <p class="text-danger">A operação de controle de pausa não pôde ser realizada.</br></br> <?= $msg ?> </p>
        
                <?php

            }
            
        }
        else{

            include("inicia-pausa.php");

        }

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">A operação de controle de pausa não pôde ser realizada.</br></br> <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>