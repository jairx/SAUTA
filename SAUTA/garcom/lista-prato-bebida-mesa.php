 <?php

    function listaTipoPrato($conexao){

        $query = "select * from TIPO_PRATO order by TIPO_PRATO";

        return mysqli_query($conexao, $query);

    }

    function listaTipoBebida($conexao){

        $query = "select * from TIPO_BEBIDA order by TIPO_BEBIDA";

        return mysqli_query($conexao, $query);

    }

    function listaMesa($conexao){

        $query = "select * from MESA order by NUMERO_LUGARES";

        return mysqli_query($conexao, $query);

    } 

    function selecionaMesa($conexao){

        if($mesas = listaMesa($conexao)){

            ?>

            <select name="idMesa" class="form-control">

                <?php foreach($mesas as $mesa): ?>

                    <option value="<?=$mesa['ID_MESA']?>">
                        <?=$mesa['NUMERO_LUGARES']?> lugares, mesa: <?=$mesa['ID_MESA']?>
                    </option>

                <?php endforeach ?>

            </select>

            <?php

        }
        else{

            $erroSelecionaMesa = mysqli_error($conexao);

            ?>

                <p class="text-danger">Erro ao tentar listar as mesas: <?= $erroSelecionaMesa ?></p>

            <?php

        } 
    }

    function selecionaTipoPrato($conexao){

        if($tiposPrato = listaTipoPrato($conexao)){

            ?>

            <select name="idTipoPrato" id="tipoPrato" class="form-control" onchange="getOptions()">

                    <option value="">
                        Escolha um tipo
                    </option>

                <?php foreach($tiposPrato as $tipo): ?>

                    <option value="<?=$tipo['ID_TIPO_PRATO']?>">
                        <?=$tipo['TIPO_PRATO']?>
                    </option>

                <?php endforeach ?>

            </select>

            <?php

        }
        else{

            $erroSelecionaTipoPrato = mysqli_error($conexao);

            ?>

                <p class="text-danger">Erro ao listar os tipos de prato: <?=$erroSelecionaTipoPrato?></p>

            <?php

        }

    }

    function selecionaTipoBebida($conexao){

        if($tiposBebida = listaTipoBebida($conexao)){

            ?>

            <select name="idTipoBebida" id="tipoBebida" class="form-control" onchange="getBebida()">

                <option value="">
                    Escolha um tipo
                </option>

                <?php foreach($tiposBebida as $tipo): ?>

                    <option value="<?=$tipo['ID_TIPO_BEBIDA']?>">
                        <?=$tipo['TIPO_BEBIDA']?>
                    </option>

                <?php endforeach ?>

            </select>

            <?php

        }
        else{

            $erroSelecionaTipoBebida = mysqli_error($conexao);

            ?>

                <p class="text-danger">Erro ao listar os tipos de bebida: <?=$erroSelecionaTipoBebida?></p>

            <?php

        }

    }

?>