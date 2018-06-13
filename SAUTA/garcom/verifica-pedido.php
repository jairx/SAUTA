<?php

    $isTherePrato = 0;
    $isThereBebida = 0;
    $pg= 0;
    $isThereMesa = 0;
    $obsPrato = null;
    $obsBebida = null;
    $obsPedido = null;

    if(isset($_POST['garcomNovoPedido'])){

        $pg = 227;

    }
    elseif(isset($_POST['gerenteNovoPedido'])){

        $pg = 247;

    }
    else{

        $pg = 0;

    }

    function redireciona($pg){

        $incompleto = 1;

        if($pg==227 or $pg==247){
            header('Location: formulario-pedido.php?idPagina=<?=$pg?>&incompleto=<?=$incompleto?>');
        }
        else{
            header('Location: formulario-pedido.php?incompleto=<?=$incompleto?>');
        }

    }

    if(isset($_POST['idMesa'])){

        $idMesa = $_POST['idMesa'];

        ++$isThereMesa;

    }
    else{

        redireciona($pg);

    }

    if(isset($_POST['idTipoPrato']) or isset($_POST['idPrato']) or isset($_POST['qtdPrato'])){
             
        if(isset($_POST['idTipoPrato']) and isset($_POST['idPrato']) and isset($_POST['qtdPrato'])){

            $idTipoPrato = $_POST['idTipoPrato'];
            $idPrato = $_POST['idPrato'];
            $qtdPrato = $_POST['qtdPrato'];

            ++$isTherePrato;

        }
        else{

            redireciona($pg);

        }

    }
    else{

        $idTipoPrato = null;
        $idPrato = null;
        $qtdPrato = null;

    }

    if(isset($_POST['idTipoBebida']) or isset($_POST['idBebida']) or isset($_POST['qtdBebida'])){
             
        if(isset($_POST['idTipoBebida']) and isset($_POST['idBebida']) and isset($_POST['qtdBebida'])){

            $idTipoBebida = $_POST['idTipoBebida'];
            $idBebida = $_POST['idBebida'];
            $qtdBebida = $_POST['qtdBebida'];

            ++$isThereBebida;

        }
        else{

            redireciona($pg);

        }

    }
    else{

        $idTipoBebida = null;
        $idBebida = null;
        $qtdBebida = null;
        
    }

    if(isset($_POST['obsPrato'])){

        $obsPrato = $_POST['obsPrato'];

    }

    if(isset($_POST['obsBebida'])){

        $obsBebida = $_POST['obsBebida'];

    }

    if(isset($_POST['obsPedido'])){

        $obsPedido = $_POST['obsPedido'];

    }

    if(($isTherePrato==1 or $isThereBebida==1) and ($isThereMesa==1)){

        include("cadastro-pedido.php");

    }
    else{
        redireciona($pg);
    }

?>