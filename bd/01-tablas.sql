USE `bingo`;
CREATE TABLE `cartones`(`id_carton` TINYINT PRIMARY KEY AUTO_INCREMENT, `numeros` VARCHAR(150) NOT NULL, `estado_default` VARCHAR(150) NOT NULL);
CREATE TABLE `jugadores`(`id_jugador` TINYINT PRIMARY KEY AUTO_INCREMENT, `nombre_jugador` VARCHAR(50) NOT NULL);
CREATE TABLE `partida`(`id_jugador` TINYINT ,`id_carton` TINYINT , `estado` VARCHAR(150) NOT NULL, FOREIGN KEY (`id_carton`) REFERENCES `cartones`(`id_carton`), FOREIGN KEY (`id_jugador`) REFERENCES `jugadores`(`id_jugador`));
CREATE TABLE `log`(`log` VARCHAR (150));