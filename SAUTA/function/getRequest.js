function getOptions(){

    objOpt.idTipoPrato = $("#tipoPrato").val();
    
    $("#prato").load("/admin/filtroAdm.php", objOpt, 
    function( response, status, xhr ) {
    if ( status == "error" ) {
    var msg = "Oooops! Erro na solicitação: ";
    $( "#filtroAdm" ).html( msg + xhr.status + " " + xhr.statusText );
    }
    }
    );
    return false;
    }
    
    function getParams(){
    objOpt = {};
    
    $("div#filtroAdm :enabled:checked").each(function (ind, ele){
    objOpt[ele.name] = ele.value;
    });
    
    objOpt.fabricante = [];
    $("#fabsele option:selected").each(function (ind, ele){
    objOpt.fabricante.push(ele.value);
    });
    objOpt.argumento = $("#argumento").val();
    objOpt.codigo = $("#codigo").val();
    return objOpt;
    }
    
    <?php
    include("conn.php");
    include("../layout/classFiltro.php");
    include("../layout/functions.php");
    
    session_start();
    
    $filtro = unserialize($_SESSION["objFiltroAdm"]);
    
    debugi("ajax",serialize($_REQUEST));
    $arrReq = $_REQUEST;
    if (isset($arrReq['argumento'])) $arrReq['argumento'] = utf8_decode($arrReq['argumento']);
    
    #debugi("session",serialize($_SESSION));
    $filtro->registraRequest($arrReq);
    
    $filtro->setDivFiltro();
    
    $_SESSION["objFiltroAdm"] = serialize($filtro);
    
    echo $filtro->getDivFiltro();
    ?>