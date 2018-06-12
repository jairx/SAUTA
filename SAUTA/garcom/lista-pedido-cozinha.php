<?php

    include("conecta.php");
    include("data-hora.php");

    function listaPedidosCozinha($conexao){

        $query = "select a.ID_PEDIDO, a.DATA, a.HORARIO, a.HORARIO_AGENDAMENTO, a.OBSERVACAO,
                  b.ID_MESA,
                  b.NOME_CLIENTE,
                  d.PRATO, d.OBSERVACAO as OBS_PRATO,
                  d.TEMPO_PREPARO as TEMPO_PRATO,
                  f.TEMPO_PREPARO as TEMPO_BEBIDA,
                  f.BEBIDA, f.OBSERVACAO as OBS_BEBIDA
                  from PEDIDO a
                  left join (select clime.ID_CLIENTE_MESA, cli.NOME_CLIENTE, clime.ID_MESA from CLIENTE_MESA clime inner join CLIENTE cli on cli.ID_CLIENTE = clime.ID_CLIENTE) b on b.ID_CLIENTE_MESA = a.ID_CLIENTE_MESA
                  left join (select pepa.ID_PEDIDO, pr.TEMPO_PREPARO, pr.PRATO, pepa.OBSERVACAO from PEDIDO_PRATO pepa inner join PRATO pr on pr.ID_PRATO = pepa.ID_PRATO) d on d.ID_PEDIDO = a.ID_PEDIDO
                  left join (select pebe.ID_PEDIDO, be.TEMPO_PREPARO, be.BEBIDA, pebe.OBSERVACAO from PEDIDO_BEBIDA pebe inner join BEBIDA be on be.ID_BEBIDA = pebe.ID_BEBIDA) f on f.ID_PEDIDO = a.ID_PEDIDO
                  where a.PRONTO = 0
                  order by b.NOME_CLIENTE, b.ID_MESA";

        return mysqli_query($conexao, $query);

    }

    if(($pedidoCozinha = listaPedidosCozinha($conexao))){

        ?>

            <form action="garcom/formulario-pedido?garcomNovoPedido='227'.php">

                <button class="btn btn-primary">Novo</button></br>

            </form>

            <table class="table" onload="setTimeout('Atualizar()', 60000)">
               
                <tr>
                    <td>Cliente</td>
                    <td>Data</td>
                    <td>Horário</td>
                    <td>Término Previsto</td>
                    <td>Observacao</td>
                    <td>Prato</td>
                    <td>Observação</td>
                    <td>Bebida</td>
                    <td>Observação</td>
                    <td>Mesa</td>
                </tr>

                <?php foreach($pedidoCozinha as $pedido): ?>

                    <tr>
                        <td><?= $pedido['NOME_CLIENTE'] ?></td>
                        <td><?= $pedido['DATA'] ?></td>
                        <td><?= $pedido['HORARIO'] ?></td>
                        <td><?= $pedido['HORARIO_AGENDAMENTO'] ?></td>
                        <td><?= $pedido['OBSERVACAO'] ?></td>
                        <td><?= $pedido['PRATO'] ?></td>
                        <td><?= $pedido['OBS_PRATO'] ?></td>
                        <td><?= $pedido['BEBIDA'] ?></td>
                        <td><?= $pedido['OBS_BEBIDA'] ?></td>
                        <td><?= $pedido['ID_MESA'] ?></td>

                        <td>
                            <form action="garcom/editar-pedido.php" method="POST">
                                <input type="hidden" name="idPedido" value="<?= $pedido['ID_PEDIDO'] ?>">
                                <button class="btn btn-success">Editar</button>
                            </form>
                        </td>

                        <td>
                            <form action="garcom/cancelar-pedido.php" method="POST">
                                <input type="hidden" name="idPedido" value="<?= $pedido['ID_PEDIDO'] ?>">
                                <button class="btn btn-success">Cancelar</button>
                            </form>
                        </td>
                    </tr>

                <?php endforeach ?>                
            </table>

        <?php

        if(isset($_GET['cancelado'])){

            ?>

                <p class="text-success">Pedido cancelado com sucesso!</p>

            <?php

        }

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">Houve um erro ao tentar listar os pedidos da cozinha.</br></br> <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>