<?php include("seleciona-pausa-garcom.php"); ?>

<form action="garcom/verifica-pausa.php" method="POST">
    <div>
        <div>
            <select name="garcom" class="form-control">
                <?php foreach($garcom as $bar): ?>
                    <option value="<?= $bar['ID_GARCOM'] ?>">
                        <?= $bar['NOME_GARCOM'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <select name="tipo_pausa" class="form-control">
                <?php foreach($tipos_pausa as $tipo): ?>
                    <option value="<?= $tipo['ID_TIPO_PAUSA'] ?>">
                        <?= $tipo['NOME_PAUSA'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button class="btn btn-success">Pausar/Retornar</button>
        </div>
    </div>
</form>