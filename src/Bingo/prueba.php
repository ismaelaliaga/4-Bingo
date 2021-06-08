<?php

declare(strict_types=1);

require_once ('Bingo.php');
require_once ('Bombo.php');
require_once ('Jugador.php');
require_once ('Carton.php');

// $partida = new Bingo("Ismael", 1, "Andrés", 2, "Rafa", 1, "Alberto", 1);
// $arrayConLosJugadores = $partida->getJugadores();
function crearPartia($nombreJ1, $cartonesJ1, $nombreJ2, $cartonesJ2, $nombreJ3, $cartonesJ3,
$nombreJ4, $cartonesJ4){
    $partida = new Bingo("$nombreJ1", $cartonesJ1, "$nombreJ2", $cartonesJ2, "$nombreJ3", $cartonesJ3,
    "$nombreJ4", $cartonesJ4);
    return $partida;
}
$partidaComenzada = crearpartia("Ismael", 1, "Andrés", 2, "Rafa", 3, "Alberto", 1);

$arrayConLosJugadores = $partidaComenzada->getJugadores();
$jugador1 = $arrayConLosJugadores[0];
$jugador2 = $arrayConLosJugadores[1];
$jugador3 = $arrayConLosJugadores[2];
$jugador4 = $arrayConLosJugadores[3];

$arrayConLosCartonesDelJugador1 = $jugador1->getCartones();
var_dump($jugador1->getCartones());
$primerCartonDelJugador1 = $arrayConLosCartonesDelJugador1[0];

$arrayConLosCartonesDelJugador2 = $jugador2->getCartones();
$primerCartonDelJugador2 = $arrayConLosCartonesDelJugador1[0];
$segundoCartonDelJugador2 = $arrayConLosCartonesDelJugador1[1];

$arrayConLosCartonesDelJugador3 = $jugador3->getCartones();
$primerCartonDelJugador3 = $arrayConLosCartonesDelJugador1[0];
$segundoCartonDelJugador3 = $arrayConLosCartonesDelJugador1[1];
$tercerCartonDelJugador3 = $arrayConLosCartonesDelJugador1[2];

$arrayConLosCartonesDelJugador4 = $jugador4->getCartones();

// echo "El primer jugador se llama " . $arrayConLosJugadores[0]->getNombre() . " y tiene ";
// $arrayConLosCartonesDelJ1 = $arrayConLosJugadores[0]->getCartones();
// if($arrayConLosCartonesDelJ1[0]){
//     $idDelPrimerCarton = $arrayConLosCartonesDelJ1[0]->devolverID();
//     echo "el cartón $idDelPrimerCarton";
// }
// // if($arrayConLosCartonesDelJ1[1]){
// //     $idDelSegundoCarton = $arrayConLosCartonesDelJ1[1]->devolverID();
// //     echo ", el cartón $idDelSegundoCarton";
// // }
// // if($arrayConLosCartonesDelJ1[2]){
// //     $idDelTercerCarton = $arrayConLosCartonesDelJ1[2]->devolverID();
// //     echo ", el cartón $idDelTercerCarton";
// // }
// echo ".</br>";

// echo "El segundo jugador se llama " . $arrayConLosJugadores[1]->getNombre() . " y tiene ";
// $arrayConLosCartonesDelJ2 = $arrayConLosJugadores[1]->getCartones();
// if($arrayConLosCartonesDelJ2[0]){
//     $idDelPrimerCarton = $arrayConLosCartonesDelJ2[0]->devolverID();
//     echo "el cartón $idDelPrimerCarton";
// }
// // if($arrayConLosCartonesDelJ1[1]){
// //     $idDelSegundoCarton = $arrayConLosCartonesDelJ1[1]->devolverID();
// //     echo ", el cartón $idDelSegundoCarton";
// // }
// // if($arrayConLosCartonesDelJ1[2]){
// //     $idDelTercerCarton = $arrayConLosCartonesDelJ1[2]->devolverID();
// //     echo ", el cartón $idDelTercerCarton";
// // }
// echo ".</br>";
// $arrayConLosCartonesDelJ2[1];

// echo "El tercer jugador se llama " . $arrayConLosJugadores[2]->getNombre() . " y tiene ";
// $arrayConLosCartonesDelJ3 = $arrayConLosJugadores[2]->getCartones();
// if($arrayConLosCartonesDelJ3[0]){
//     $idDelPrimerCarton = $arrayConLosCartonesDelJ3[0]->devolverID();
//     echo "el cartón $idDelPrimerCarton";
// }
// // if($arrayConLosCartonesDelJ1[1]){
// //     $idDelSegundoCarton = $arrayConLosCartonesDelJ1[1]->devolverID();
// //     echo ", el cartón $idDelSegundoCarton";
// // }
// // if($arrayConLosCartonesDelJ1[2]){
// //     $idDelTercerCarton = $arrayConLosCartonesDelJ1[2]->devolverID();
// //     echo ", el cartón $idDelTercerCarton";
// // }
// echo ".</br>";

// echo "El cuarto jugador se llama " . $arrayConLosJugadores[3]->getNombre() . " y tiene ";
// $arrayConLosCartonesDelJ4 = $arrayConLosJugadores[3]->getCartones();
// if($arrayConLosCartonesDelJ4[0]){
//     $idDelPrimerCarton = $arrayConLosCartonesDelJ4[0]->devolverID();
//     echo "el cartón $idDelPrimerCarton";
// }
// // if($arrayConLosCartonesDelJ1[1]){
// //     $idDelSegundoCarton = $arrayConLosCartonesDelJ1[1]->devolverID();
// //     echo ", el cartón $idDelSegundoCarton";
// // }
// // if($arrayConLosCartonesDelJ1[2]){
// //     $idDelTercerCarton = $arrayConLosCartonesDelJ1[2]->devolverID();
// //     echo ", el cartón $idDelTercerCarton";
// // }
// echo ".</br>";

// $bombo = new Bombo;
// $primeraBola = $bombo->sacarBola();
// echo "El crupier saca la primera bola, que el $primeraBola.</br>";
// echo $arrayConLosCartonesDelJ1[0]->buscarNumeroEnElCarton($primeraBola) . "</br>";
// echo $arrayConLosCartonesDelJ2[0]->buscarNumeroEnElCarton($primeraBola) . "</br>";
// echo $arrayConLosCartonesDelJ3[0]->buscarNumeroEnElCarton($primeraBola) . "</br>";
// echo $arrayConLosCartonesDelJ4[0]->buscarNumeroEnElCarton($primeraBola) . "</br>";

// $segundaBola = $bombo->sacarBola();
// echo "El crupier saca la segunda, que el $segundaBola.</br>";
// echo $arrayConLosCartonesDelJ1[0]->buscarNumeroEnElCarton($segundaBola) . "</br>";
// echo $arrayConLosCartonesDelJ2[0]->buscarNumeroEnElCarton($segundaBola) . "</br>";
// echo $arrayConLosCartonesDelJ3[0]->buscarNumeroEnElCarton($segundaBola) . "</br>";
// echo $arrayConLosCartonesDelJ4[0]->buscarNumeroEnElCarton($segundaBola) . "</br>";

// $terceraBola = $bombo->sacarBola();
// echo "El crupier saca la primera bola, que el $terceraBola.</br>";
// echo $arrayConLosCartonesDelJ1[0]->buscarNumeroEnElCarton($terceraBola) . "</br>";
// echo $arrayConLosCartonesDelJ2[0]->buscarNumeroEnElCarton($terceraBola) . "</br>";
// echo $arrayConLosCartonesDelJ3[0]->buscarNumeroEnElCarton($terceraBola) . "</br>";
// echo $arrayConLosCartonesDelJ4[0]->buscarNumeroEnElCarton($terceraBola) . "</br>";
