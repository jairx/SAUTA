<?php

    include("../conecta.php");

    $idTipoPrato = $_REQUEST['idTipoPrato'];

    function listaPrato($conexao, $idTipoPrato){

        $query = "select * from PRATO where ID_TIPO_PRATO = {$idTipoPrato} order by PRATO";

        return mysqli_query($conexao, $query);

    }


        if($pratos = listaPrato($conexao, $idTipoPrato)){

            ?>

            <select name="idPrato" class="form-control">

            <?php

                if($idTipoPrato==""){
                    ?>
                    
                    <option value="">
                        Escolha um Prato
                    </option>

                    <?php

                }
                else{

                    foreach($pratos as $prato): ?>

                        <option value="<?=$prato['ID_PRATO']?>">
                            <?=$prato['PRATO']?>
                        </option>

                    <?php endforeach ?>

                    <?php

                }
            
            ?>

            </select>

            <?php

        }
        else{

            $erroPrato = mysqli_error($conexao);

            ?>

                <p class="text-danger">Erro ao listar os pratos: <?=$erroPrato?></p>

            <?php

        }

?>