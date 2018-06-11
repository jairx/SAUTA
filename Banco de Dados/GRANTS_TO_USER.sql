create user u968512456_teamx@localhost identified by 'Copa2018';

grant create, drop, delete, insert, select, update on u968512456_sauta.bebida to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.prato to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.tipo_prato to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.tipo_bebida to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.pedido_prato to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.pedido_bebida to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.pedido to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.garcom to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.disponibilidade to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.interrupcoes_jornada to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.tipo_pausa to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.cliente_mesa to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.mesa to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.cliente to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.telefone to u968512456_teamx@localhost;

grant create, drop, delete, insert, select, update on u968512456_sauta.reserva to u968512456_teamx@localhost;

flush privileges;

