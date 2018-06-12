<?php

    include("conecta.php");
    include("data-hora.php");

    function listaPedidos($conexao){

        $query = "select a.ID_PEDIDO, a.ID_GARCOM, a.DATA, a.DATA_FIM, a.HORARIO,
                  a.HORARIO_FIM, a.HORARIO_AGENDAMENTO,
                  b.ID_MESA, b.ID_CLIENTE_MESA,
                  b.NOME_CLIENTE,
                  c.NOME_GARCOM
                  from PEDIDO a
                  left join (select clime.ID_MESA, clime.ID_CLIENTE_MESA, clime.ID_CLIENTE, cli.NOME_CLIENTE from CLIENTE_MESA clime inner join CLIENTE cli on clime.ID_CLIENTE = cli.ID_CLIENTE) b on b.ID_CLIENTE_MESA = a.ID_CLIENTE_MESA
                  left join GARCOM c on c.ID_GARCOM = a.ID_GARCOM
                  where a.PRONTO = 1
                  and a.ATENDIDO is null                  
                  ";

        return mysqli_query($conexao, $query);

    }

    if(($pedidoGarcom = listaPedidos($conexao))){

        ?>

            <table class="table" onload="setTimeout('Atualizar()', 60000)">
               
                <tr>
                    <td>Pedido</td>
                    <td>Garçom</td>
                    <td>Data do Pedido</td>
                    <td>Horário</td>
                    <td>Data Pronto Cozinha</td>
                    <td>Horário</td>
                    <td>Horário Agendado</td>
                    <td>Cliente</td>
                    <td>Mesa</td>
                </tr>

                <?php foreach($pedidoGarcom as $pedido): ?>

                    <tr>
                        <td><?= $pedido['ID_PEDIDO'] ?></td>
                        <td><?= $pedido['NOME_GARCOM'] ?></td>
                        <td><?= $pedido['DATA'] ?></td>
                        <td><?= $pedido['HORARIO'] ?></td>
                        <td><?= $pedido['DATA_FIM'] ?></td>
                        <td><?= $pedido['HORARIO_FIM'] ?></td>
                        <td><?= $pedido['HORARIO_AGENDAMENTO'] ?></td>
                        <td><?= $pedido['NOME_CLIENTE'] ?></td>
                        <td><?= $pedido['ID_MESA'] ?></td>

                        <td>
                            <form action="garcom/atendimento-fim.php" method="POST">
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

            <p class="text-danger">Houve um erro ao tentar listar os atendimentos em curso.</br></br> <?= $msg ?> </p>

        <?php

    }

    mysqli_close($conexao);

?>