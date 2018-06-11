<?php

    include("conecta.php");
    include("data-hora-br.php");

    function listaPedidos($conexao){

        $query = "select a.ID_PEDIDO, a.ID_GARCOM, a.DATA, a.DATA_FIM, a.HORARIO,
                  a.HORARIO_FIM, a.HORARIO_AGENDAMENTO,
                  b.ID_MESA,
                  c.NOME_CLIENTE 
                  from PEDIDO a
                  inner join CLIENTE_MESA b on b.ID_CLIENTE_MESA = a.ID_CLIENTE_MESA
                  inner join CLIENTE c on c.ID_CLIENTE = b.ID_CLIENTE
                  where a.PRONTO = 1
                  and a.ATENDIDO is null                  
                  ";

        return mysqli_query($conexao, $query);

    }

    if(($pedidoGarcom = listaPedidos($conexao))){

        ?>

            <table class="table" onload="setTimeout('Atualizar()', 60000)">
               
                <tr>
                    <td>Data do Pedido</td>
                    <td>Horário</td>
                    <td>Data Pronto Cozinha</td>
                    <td>Horário</td>
                    <td>Horário Agendado</td>
                    <td>Cliente</td>
                    <td>Mesa</td>
                </tr>

                <?php foreach($pedidoGarcom as $pedido): 
                
                    $pedido['DATA'] = dataGente($pedido['DATA']);
                    $pedido['DATA_FIM'] = dataGente($pedido['DATA_FIM']);
                
                ?>

                    <tr>
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