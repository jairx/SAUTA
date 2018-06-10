<?php

    include("../conecta.php");
    include("../data-hora.php");

    
    function tempoDisponivel($conexao){
        $query = "select min(INICIO)
                  from DISPONIBILIDADE
                  where FIM = null
                 ";

        return mysqli_query($conexao, $query);
    }

?>