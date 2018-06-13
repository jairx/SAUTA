<?php

    include("../conecta.php");
    include("lista-prato-bebida-mesa.php");

    $idTipoPrato = $_REQUEST['idTipoPrato'];

        if($pratos = listaPrato($conexao, $idTipoPrato)){

            ?>

            <select name="idPrato" id="prato" class="form-control" onchange="getPrato()">

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