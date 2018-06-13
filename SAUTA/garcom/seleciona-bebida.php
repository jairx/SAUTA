<?php

    include("../conecta.php");

    $idTipoBebida = $_REQUEST['idTipoBebida'];

    function listaBebida($conexao, $idTipoBebida){

        $query = "select * from BEBIDA where ID_TIPO_BEBIDA = {$idTipoBebida} order by BEBIDA";

        return mysqli_query($conexao, $query);

    } 

    if($bebidas = listaBebida($conexao, $idTipoBebida)){

        ?>

        <select name="idBebida" class="form-control">

        <?php

            if($idTipoBebida==""){

                ?>

                <option value="">
                    Escolha uma Bebida
                </option>

                <?php

            }
            else{

                foreach($bebidas as $bebida): ?>

                    <option value="<?=$bebida['ID_BEBIDA']?>">
                        <?=$bebida['BEBIDA']?>
                    </option>

                <?php endforeach ?>

                <?php

            }

        ?>

        </select>

        <?php

    }
    else{

        $erroBebida = mysqli_error($conexao);

        ?>

            <p class="text-danger">Erro ao listar as bebidas: <?=$erroBebida?></p>

        <?php

    }

?>