<?php

    include("../conecta.php");
    include("../data-hora.php");
    
    function selecionaMenorData($conexao){
        $query = "select min(DATA_INICIO)
                  from DISPONIBILIDADE
                  where FIM is null";

        $resultado = mysqli_query($conexao, $query);

        $menorData = mysqli_fetch_assoc($resultado);

        return $menorData;
    }

    function selecionaMenorHorario($conexao, $menorData){

        $query = "select min(INICIO) from DISPONIBILIDADE where DATA_INICIO = {$menorData} and FIM is null";

        $resultado = mysqli_query($conexao, $query);

        $menorHorario = mysqli_fetch_assoc($resultado);

        return $menorHorario;

    }

    function selecionaGarcom($conexao, $menorData, $menorHorario){

        $query = "select ID_GARCOM from DISPONIBILIDADE where INICIO = {$menorHorario} and DATA_INICIO = {$menorData} and FIM is null";

        $resultado = mysqli_query($conexao, $query);

        $idGarcom = mysqli_fetch_assoc($resultado);

        return $idGarcom;

    }

$menorData = selecionaMenorData($conexao);
$menorHorario = selecionaMenorHorario($conexao, $menorData);
$idGarcom = selecionaGarcom($conexao, $menorData, $menorHorario);

?>