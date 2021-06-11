<?php

declare(strict_types=1);

namespace Daw\Bingo;

/**
 * Sirve para sacar un número que no haya salido anteriormente
 * 
 * Tiene como atributo un array con todas las bolas disponibles, todas las que no han salido aún en la partida. 
 * Tiene una función con la que saca una bola, devuelve un número y lo anota en un archivo .txt para no volver a incluirla en el atributo 
 * (array) $bolas al crear el objeto, y no volver a sacarla
 * 
 * @version v1.0
 * 
 */
final class Carton {
    private array $carton;
    private int $id;
    const CARTONES = 60;

    /**
     * El constructor
     *
     */
    public function __construct(){
        include ('conexionbd.php');

        $cartonesDisponibles = array();
        $contadorDeFgets = 0;

        //Abre el fichero para obtener los cartones que no están disponibles, los guarda en $cartonesSacados
        $fichero = fopen("./cartones.txt", "rb+");
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

        $fichero = fopen("./cartones.txt", "ab+");
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

    /**
     * Devuelve el atributo id del objeto
     *
     * @return int
     */
    public function devolverID(){
        return $this->id;
    }

    /**
     * Devuelve el estado base, por defecto, del carton 
     * 
     * @return string
     */
    public function obtenerEstado(){

        include ('conexionbd.php');

        $estadoDefault = $db->prepare("SELECT `estado_default` FROM `cartones` WHERE `id_carton` = ?"); 
        $estadoDefault->bind_param('i', $this->id); 
        $estadoDefault->execute();
        $estadoDefault->bind_result($estado);
        $estadoDefault->fetch();

        return $estado;
    }

    /**
     * Cambia la id del objeto
     *
     * @param int $numero Número que se le quiere asignar a la id
     */
    public function asignarID($numero){
        $this->id = $numero;
    }

}