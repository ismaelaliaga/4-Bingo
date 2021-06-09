<?php
declare(strict_types=1);

include_once('funciones.php');
require_once ('Bombo.php');
$bombo = new Bombo;

echo $a = $bombo->sacarBola();

// $fichero = fopen("bolas.txt", "rb+");
// while($a = intval(fgets($fichero))){
// if($contadorDeFgets == 0){
//                 $string = trim("$a");
//                 $contadorDeFgets++;
//             }
//             else{
//                 $string = $string . " " . trim("$a");
//             }
//         }
// fclose($fichero);

buscarNumeroEnElCarton($a,3);
buscarNumeroEnElCarton($a,5);
buscarNumeroEnElCarton($a,8);
buscarNumeroEnElCarton($a,6);
buscarNumeroEnElCarton($a,4);
buscarNumeroEnElCarton($a,7);
buscarNumeroEnElCarton($a,9);

cantarLinea(3);
cantarLinea(5);
cantarLinea(8);
cantarLinea(6);
cantarLinea(4);
cantarLinea(7);
cantarLinea(9);

