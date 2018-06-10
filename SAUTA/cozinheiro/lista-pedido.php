<?php

    function listaPedido($conexao){
        
        $pedidos = array();
        $query = "select c.PRATO, b.QUANTIDADE, b.OBSERVACAO as 'OBS_PRATO', e.BEBIDA, 
                  d.QUANTIDADE, d.OBSERVACAO as 'OBS_BEBIDA', 
                  a.HORARIO_AGENDAMENTO, a.OBSERVACAO as 'OBS_PEDIDO'
                  from PEDIDO a
                  inner join PEDIDO_PRATO b on b.ID_PEDIDO = a.ID_PEDIDO
                  inner join PRATO c on c.ID_PRATO = b.ID_PRATO
                  inner join PEDIDO_BEBIDA d on d.ID_PEDIDO = a.ID_PEDIDO
                  inner join BEBIDA e on e.ID_BEBIDA = d.ID_BEBIDA
                  ";
        $resultado = mysqli_query($conexao, $query);
        
        while($pedido = mysqli_fetch_assoc($resultado)){

            array_push($pedidos, $pedido);

        }

        return $pedidos;

    }