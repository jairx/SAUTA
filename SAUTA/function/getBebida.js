function getBebida(){
    objOpt = {};
    objOpt.idTipoBebida = $("#tipoBebida").val();
    
    $("#bebida").load("../garcom/seleciona-bebida.php", objOpt, 
        function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Oooops! Erro na solicitação: ";
                $( "#prato" ).html( msg + xhr.status + " " + xhr.statusText );
            }
        });

    return false;

    }
