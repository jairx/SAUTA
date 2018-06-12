<?php

    function listaPedido($conexao){
        
        $pedidos = array();

        $query = "select a.ID_PEDIDO, a.DATA, a.HORARIO, a.HORARIO_AGENDAMENTO, a.OBSERVACAO as OBS_PEDIDO,
                  b.ID_MESA,
                  b.NOME_CLIENTE,
                  d.QUANTIDADE as QTD_PRATO, f.QUANTIDADE as QTD_BEBIDA,
                  d.PRATO, d.OBSERVACAO as OBS_PRATO,
                  d.TEMPO_PREPARO as TEMPO_PRATO,
                  f.TEMPO_PREPARO as TEMPO_BEBIDA,
                  f.BEBIDA, f.OBSERVACAO as OBS_BEBIDA
                  from PEDIDO a
                  left join (select clime.ID_CLIENTE_MESA, cli.NOME_CLIENTE, clime.ID_MESA from CLIENTE_MESA clime inner join CLIENTE cli on cli.ID_CLIENTE = clime.ID_CLIENTE) b on b.ID_CLIENTE_MESA = a.ID_CLIENTE_MESA
                  left join (select pepa.ID_PEDIDO, pepa.QUANTIDADE, pr.TEMPO_PREPARO, pr.PRATO, pepa.OBSERVACAO from PEDIDO_PRATO pepa inner join PRATO pr on pr.ID_PRATO = pepa.ID_PRATO) d on d.ID_PEDIDO = a.ID_PEDIDO
                  left join (select pebe.ID_PEDIDO, pebe.QUANTIDADE, be.TEMPO_PREPARO, be.BEBIDA, pebe.OBSERVACAO from PEDIDO_BEBIDA pebe inner join BEBIDA be on be.ID_BEBIDA = pebe.ID_BEBIDA) f on f.ID_PEDIDO = a.ID_PEDIDO
                  where a.PRONTO = 0
                  order by b.NOME_CLIENTE, b.ID_MESA";

        $resultado = mysqli_query($conexao, $query);
        
        while($pedido = mysqli_fetch_assoc($resultado)){

            array_push($pedidos, $pedido);

        }

        return $pedidos;

    }