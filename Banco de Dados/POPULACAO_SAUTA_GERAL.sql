insert into GARCOM (NOME_GARCOM)
values ("Juán"),
("Mônica"),
("Alcivaldo"),
("Manuela"),
("Jeremias"),
("Solano"),
("Menerval");

insert into TIPO_PAUSA (NOME_PAUSA)
values ("Lanche"),
("Almoço"),
("Jantar"),
("Banheiro"),
("Outros");

insert into INTERRUPCOES_JORNADA (DATA, INICIO, FIM, DATA_FIM, ID_TIPO_PAUSA, ID_GARCOM)
values ("2018-04-18", "00:11:00", "00:15:00", "2018-04-18", 1, 1), 
("2018-05-14", "00:15:12", "00:23:00", "2018-05-14", 5, 1),
("2018-06-17", "18:11:37", "18:17:00", "2018-06-17", 3, 2), 
("2018-06-23", "14:17:32", "14:44:20", "2018-06-23", 2, 4),
("2018-06-10", "15:23:32", "15:38:07", "2018-06-10", 5, 3),
("2018-06-10", "11:14:57", null, null, 5, 6),
("2018-06-10", "16:52:44", null, null, 4, 1);

insert into DISPONIBILIDADE (DATA_INICIO, DATA_FIM, INICIO, FIM, ID_GARCOM)
values ("2018-06-08", "2018-06-08", "11:24:37", "11:48:23", 2),
("2018-06-08", "2018-06-08", "12:12:12", "12:57:34", 3),
("2018-06-08", "2018-06-08", "12:48:01", "13:13:13", 5),
("2018-06-08", "2018-06-08", "13:15:27", "13:38:12", 7),
("2018-06-08", "2018-06-08", "15:27:34", "16:48:39", 4),
("2018-06-10", null, "11:15:37", null, 1),
("2018-06-10", null, "12:03:15", null, 6),
("2018-06-10", null, "12:03:28", null, 5),
("2018-06-10", null, "14:34:24", null, 4);

INSERT INTO CLIENTE (CPF, NOME_CLIENTE, DATA_NASCIMENTO, EMAIL)
VALUES ("03351596138","Jean felipe","1997-05-23","jeanfrs38@gmail.com"),
("11222334444","Samia Anjos", "2000-04-20","samiaanjos@gmail.com"),
("33452324534","Ana Cassia Ferreira Santos","1977-09-19","anacassia.fs@gmail.com"),
("32422343515", "Jennifer Ferreira","2003-09-19","jennifer_gatinha@gmail.com"),
("21423145344", "Eleonora Soares","1998-03-21","leon_sexy@gmail.com"),
("23454643343", "Hermanoteu felipes", "1999-02-28","avaraquerraba@gmail.com");

INSERT INTO TELEFONE (TELEFONE, ID_CLIENTE)
VALUES ("61986810847", 1),
("61987868584", 3),
("61989796959", 5),
("61979381206", 4),
("61787273934", 3),
("61792930123", 2),
("62992444099", 6);

INSERT INTO MESA (NUMERO_LUGARES)
VALUES (2),
(4),
(5),
(2),
(10),
(20),
(30),
(8);

INSERT INTO RESERVA (DATA, HORARIO, ID_CLIENTE, ID_MESA)
VALUES ("2018-06-13", "22:20:00", 1, 2),
("2018-06-14", "18:10:00", 4, 5),
("2018-06-13", "19:00:00", 3, 7),
("2018-06-17", "20:30:00", 2, 3),
("2018-06-12", "21:40:00", 5, 6),
("2018-06-14", "20:10:00", 6, 2),
("2018-07-02", "12:37:15", 3, 4);

INSERT INTO CLIENTE_MESA (DATA, DATA_FIM, HORARIO, HORARIO_FIM, ID_CLIENTE, ID_MESA)
VALUES ("2018-06-04", "2018-06-04", "14:00:00", "15:27:33", 1, 3),
("2018-06-04", "2018-06-04", "15:32:57", "16:04:04", 2, 4),
("2018-06-07", "2018-06-07", "18:25:17", "19:17:21", 5, 8),
("2018-06-10", "2018-06-10", "20:47:30", "21:42:11", 6, 1),
("2018-06-11", null, "21:00:00", null, 3, 5),
("2018-06-11", null, "22:30:00", null, 4, 2);

insert into PEDIDO (DATA, DATA_FIM, HORARIO, HORARIO_FIM, HORARIO_AGENDAMENTO, PRONTO, ID_GARCOM, OBSERVACAO, ID_CLIENTE_MESA)
values ("2017-11-18", "2017-11-18", "00:11:00", "00:23:15", "00:15:00", true, 2, "que nao demore muito", 1), 
("2018-02-14", "2018-02-14", "00:15:12", "00:37:15", "00:23:00", true, 3, "sem demora", 1),
("2018-05-17", "2018-05-17", "18:11:37", "19:03:31", "18:17:00", true, 6, "no late", 2), 
("2018-05-23", "2018-05-23", "14:17:32", "14:48:59", "14:44:20", true, 4, "me surpreenda", 4),
("2018-06-08", "2018-06-08", "15:23:32", "15:43:13", "15:38:07", true, 7, "no tempo", 3);

insert into PEDIDO (DATA, DATA_FIM, HORARIO, HORARIO_FIM, HORARIO_AGENDAMENTO, PRONTO, OBSERVACAO, ID_CLIENTE_MESA)
values ("2018-06-10", null, "11:14:57", null, "11:26:14", false, "tanto faz", 5),
("2018-06-10", null, "16:52:54", null, "17:06:33", false, "kero", 2);

insert into TIPO_PRATO (TIPO_PRATO)
values ("Japonês"), 
("Indiano"), 
("Almoço"), 
("Jantar"), 
("Lanche"), 
("Aperitivo"), 
("Entrada"), 
("Prato Principal"), 
("Sobremesa");

insert into TIPO_BEBIDA (TIPO_BEBIDA)
values ("Refrigerante"), 
("Suco"), 
("Cerveja"), 
("Água"), 
("Vinhos"), 
("Destilados"), 
("Drinks"), 
("Outras");

insert into PRATO (PRATO, INGREDIENTES, TEMPO_PREPARO, ID_TIPO_PRATO)
values ("Sushi", "arroz e salmão", "00:15:00", 1), 
("Sashimi", "salmão", "00:23:00", 1),
("Prato Executivo", "arroz, feijão e carne", "00:17:00", 3), 
("Sorvete", "coco", "00:04:00", 9),
("Sorvete", "chocolate", "00:04:00", 9),
("Pudim", "leite compensado", "00:05:00", 9),
("Petit Gateau", "bolo, calda de chocolate e sorvete", "00:06:30", 9);

insert into BEBIDA (BEBIDA, ALCOOLICA, TEMPO_PREPARO, ID_TIPO_BEBIDA)
values ("Cosmopolitan", "15", "00:09:15", 7), 
("Coca-cola", "0", "00:02:00", 1),
("Soda", "0", "00:02:00", 1), 
("Fanta", "0", "00:02:00", 1),
("Pina Colada", "13", "00:12:25", 7),
("Suco de Laranja", "0", "00:06:45", 2),
("Stella Artois", "7", "00:02:00", 3);

insert into PEDIDO_PRATO (QUANTIDADE, OBSERVACAO, ID_PEDIDO, ID_PRATO)
values (4, "choro por shoyo", 1, 2), 
(15, "choio", 2, 2),
(2, "molho xoi", 1, 4), 
(4, "cocconut, pq eu sei ingres", 4, 2),
(2, "chocolate, da Alemanha em cima do Brasil", 3, 7),
(1, "sem açúcar, por favor", 2, 2),
(3, "que venha como bolo quente e sorvete frio", 5, 7);

insert into PEDIDO_BEBIDA (QUANTIDADE, OBSERVACAO, ID_PEDIDO, ID_BEBIDA)
values (2, "600ml", 1, 2), 
(5, "mais vodka, menos doce", 2, 2),
(2, "addicted", 4, 5), 
(6, "Sem azucar, por favor", 2, 5),
(2, "", 5, 5),
(5, "fraca", 2, 3),
(2, "Com lata da copa", 1, 6);