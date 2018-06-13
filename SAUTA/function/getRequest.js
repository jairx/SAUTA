function getOptions(){
    objOpt = {};
    objOpt.idTipoPrato = $("#tipoPrato").val();
    
    $("#prato").load("../garcom/seleciona-prato.php", objOpt, 
        function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Oooops! Erro na solicitação: ";
                $( "#prato" ).html( msg + xhr.status + " " + xhr.statusText );
            }
        });

    return false;

    }
