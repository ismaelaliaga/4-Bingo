<?php

declare(strict_types=1);

final class Carton {
    private array $carton;
    private int $id;
    const CARTONES = 60;


    public function __construct(){
        require_once ('conexionbd.php');

        $cartonesDisponibles = array();
        $contadorDeFgets = 0;

        //Abre el fichero para obtener los cartones que no están disponibles, los guarda en $cartonesSacados
        $fichero = fopen("cartones.txt", "rb+");
        while($a = intval(fgets($fichero))){
            if($contadorDeFgets == 0){
                $string = trim("$a");
                $contadorDeFgets++;
            }
            else{
                $string = $string . " " . trim("$a");
            }
        }
        fclose($fichero);

        //Este isset es por si no hay ningún cartón sacado, porque entonces la variable $string no estará definida
        if(isset($string)){
            $cartonesSacados = explode(" ", $string);
        }
        
        //Este for crea un array llamado $totalDeCartonesPosibles con 60 índices, por los 60 cartones posibles
        for($i = 1; $i <= 60; $i++){
            if($i == 1){
                $totalDeCartonesPosibles = array(1 => $i);
            }
            else{
                array_push($totalDeCartonesPosibles, $i);
            }
        }

        //Si hay algún cartón no disponible entra en el isset, y elimina del array que acaba de crear el for de arriba los índices
        //que corresponden a los cartones que no están disponibles
        if(isset($string)){
            foreach($cartonesSacados as $valor){
                unset($totalDeCartonesPosibles[$valor]); 
            }
        }
        
        //La función array_values resetea los índices de un array dándole valores numéricos de 0, 1, 2, etc, por ejemplo un 
        //array("coliflor" => "perro", "lechuga" => "gato") pasará a ser array(0 => "perro, 1 => "gato)
        $cartonesDisponibles = array_values($totalDeCartonesPosibles);

        $numeroDeCartonesDisponibles = count($cartonesDisponibles)-1;
        $cogerUnCarton = rand(0, $numeroDeCartonesDisponibles);

        $idDelCarton = $cartonesDisponibles[$cogerUnCarton];
        $this->id = intval($idDelCarton);

        $fichero = fopen("cartones.txt", "ab+");
        fwrite($fichero, $idDelCarton . PHP_EOL);
        fclose($fichero);

        $numCartones = $db->prepare("SELECT `numeros` FROM `cartones` WHERE `id_carton` = ?");
        $numCartones->bind_param('i', $this->id);
        $numCartones->execute();
        $numCartones->bind_result($numeros);
        $numCartones->fetch();
            
        $arrayDeNumeros = explode(", ", $numeros);

        $this->carton = array();
        foreach($arrayDeNumeros as $valor){
            array_push($this->carton, $valor);
        }

        //Cerramos conexiones 
        $numCartones->close(); 
        $db->close(); 
    }

    public function devolverID(){
        return $this->id;
    }

    public function obtenerEstado(){

        require_once ('conexionbd.php');

        $estadoDefault = $db->prepare("SELECT `estado_default` FROM `cartones` WHERE `id_carton` = ?"); 
        $estadoDefault->bind_param('i', $this->id); 
        $estadoDefault->execute();
        $estadoDefault->bind_result($estado);
        $estadoDefault->fetch();

        return $estado;
    }

    public function asignarID($numero){
        $this->id = $numero;
    }

}