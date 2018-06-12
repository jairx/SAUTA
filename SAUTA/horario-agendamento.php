<?php

function selecionaUltimoAgendamento($idPrato){

    $query = "select max(ID_PEDIDO)
              from PEDIDO";

    return mysqli_query($conexao, $query);

}

function selecionaUltimoHorarioAgendado(){



}


?>