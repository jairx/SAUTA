<?php

    include("conecta.php");
    include("data-hora.php");

    function listaPedidosCozinha($conexao){

        $query = "select a.ID_PEDIDO, a.DATA, a.HORARIO, a.HORARIO_AGENDAMENTO, a.OBSERVACAO,
                  b.ID_MESA,
                  c.NOME_CLIENTE
                  from PEDIDO a
                  inner join CLIENTE_MESA b on b.ID_CLIENTE_MESA = a.ID_CLIENTE_MESA
                  inner join CLIENTE c on c.ID_CLIENTE = b.ID_CLIENTE
                  inner join PEDIDO_PRATO d on d.ID_PEDIDO = a.ID_PEDIDO
                  inner join PRATO e on e.ID_PRATO = d.ID_PRATO
                  inner join PEDIDO_BEBIDA f on f.ID_PEDIDO = a.ID_PEDIDO
                  inner join BEBIDA g on g.ID_BEBIDA = f.ID_BEBIDA
                  order by c.NOME_CLIENTE, ID_MESA";

        return mysqli_query($conexao, $query);

    }

    if(($pedidoCozinha = listaPedidosCozinha($conexao))){

        ?>

            <form action="garcom/formulario-pedido.php">

                <button class="btn btn-primary">Novo</button></br>

            </form>

            <table class="table" onload="setTimeout('Atualizar()', 60000)">
               
                <tr>
                    <td>Cliente</td>
                    <td>Data</td>
                    <td>Horário</td>
                    <td>Término Previsto</td>
                    <td>Observacao</td>
                    <td>Mesa</td>
                </tr>

                <?php foreach($pedidoCozinha as $pedido): ?>

                    <tr>
                        <td><?= $pedido['ID_PEDIDO'] ?></td>
                        <td><?= $pedido['NOME_GARCOM'] ?></td>
                        <td><?= $pedido['DATA'] ?></td>
                        <td><?= $pedido['HORARIO'] ?></td>
                        <td><?= $pedido['DATA_FIM'] ?></td>
                        <td><?= $pedido['HORARIO_FIM'] ?></td>

                        <td>
                            <form action="garcom/formulario-pedido.php" method="POST">
                                <input type="hidden" name="idPedido" value="<?= $pedido['ID_PEDIDO'] ?>">
                                <input type="hidden" name="idGarcom" value="<?= $pedido['ID_GARCOM'] ?>">
                                <button class="btn btn-success">Editar</button>
                            </form>
                        </td>

                        <td>
                            <form action="garcom/formulario-pedido.php" method="POST">
                                <input type="hidden" name="idPedido" value="<?= $pedido['ID_PEDIDO'] ?>">
                                <input type="hidden" name="idGarcom" value="<?= $pedido['ID_GARCOM'] ?>">
                                <button class="btn btn-success">Servido</button>
                            </form>
                        </td>
                    </tr>

                <?php endforeach ?>                
            </table>

        <?php

    }
    else{

        $msg = mysqli_error($conexao);

        ?>

            <p class="text-danger">Houve um erro ao tentar listar os pedidos da cozinha.</br></br> <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>