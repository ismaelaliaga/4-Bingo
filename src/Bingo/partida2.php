<?php
declare(strict_types=1);

include_once('funciones.php');
require_once ('Bombo.php');
include ('./conexionbd.php');
$bombo = new Bombo;

$a = $bombo->sacarBola();

$sentencia = $db->prepare("SELECT `id_carton` FROM `partida`");
$sentencia->execute();
$sentencia->bind_result($numeros);
while($sentencia->fetch()){
    buscarNumeroEnElCarton($a, $numeros);
    cantarLinea($numeros);
}


