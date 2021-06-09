truncate log;
truncate partida;
DELETE FROM `jugadores` WHERE `jugadores`.`id_jugador` = 1;
DELETE FROM `jugadores` WHERE `jugadores`.`id_jugador` = 2;
DELETE FROM `jugadores` WHERE `jugadores`.`id_jugador` = 3;
DELETE FROM `jugadores` WHERE `jugadores`.`id_jugador` = 4;
alter table `jugadores` auto_increment = 1;