<?php

    include("../conecta.php");
        
    function listaMesa($conexao){

        $query = "select * from MESA order by ID_MESA";

        return mysqli_query($conexao, $query);

    }

    if($mesas = listaMesa($conexao)){

        ?>

        <select name="mesa" class="form-control">

        <?php

            foreach($mesas as $mesa): ?>

                <option value="<?=$mesa['ID_MESA']?>">
                    <?=$mesa['NUMERO_LUGARES']?> lugares, mesa: <?=$mesa['ID_MESA']?>
                </option>

            <?php endforeach ?>

        </select>

        <?php

    }
    else{

        $erroMesa = mysqli_error($conexao);

        ?>

            <p class="text-danger">Erro ao listar as mesas: <?=$erroMesa?></p>

        <?php

    }