<?php

    include("../conecta.php");

    $garcom = array();
    $tipos_pausa = array();

    function listaPausa($conexao){
        
        $query = "select *
                  from TIPO_PAUSA";

        return mysqli_query($conexao, $query);
    }

    function listaGarcom($conexao){
        
        $query = "select ID_GARCOM, NOME_GARCOM
                  from GARCOM";

        return mysqli_query($conexao, $query);
    }

    if(($pausas = listaPausa($conexao))){

        while($pausa = mysqli_fetch_assoc($pausas)){
            array_push($tipos_pausa, $pausa);
        }

        if(($garcons = listaGarcom($conexao))){
            
            while($garcom_unico = mysqli_fetch_assoc($garcons)){
                array_push($garcom, $garcom_unico);
            }

        }
        else{

            ?>

            <p class="alert-danger">Acesso à listagem não obtido.</p>

            <?php

        }

    }
    else{

        ?>

            <p class="alert-danger">Acesso à listagem não obtido.</p>

        <?php

    }

?>