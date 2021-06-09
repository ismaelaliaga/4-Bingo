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

$servidor= "localhost";
$user= "root";
$password= NULL;
$database= "bingo";

$db = new mysqli($servidor,$user, $password,$database);

if($db->connect_error){ 
    die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
} 

$sentencia = $db->prepare("SELECT `id_carton` FROM `partida`");
$sentencia->execute();
$sentencia->bind_result($numeros);
while($sentencia->fetch()){
    buscarNumeroEnElCarton($a, $numeros);
    cantarLinea($numeros);
}


