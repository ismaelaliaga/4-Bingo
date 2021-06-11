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
final class Bombo {
    private array $bolas;

    /**
     * El constructor
     *
     */
    public function __construct(){
        $contadorDeFgets = 0;

        $fichero = fopen("./bolas.txt", "rb+");
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

        if(isset($string)){
            $bolasSacadas = explode(" ", $string);
        }

        for($i = 1; $i <= 90; $i++){
            if($i == 1){
                $totalDeBolasPosibles = array(1 => $i);
            }
            else{
                array_push($totalDeBolasPosibles, $i);
            }
        }

        if(isset($string)){
            foreach($bolasSacadas as $valor){
                unset($totalDeBolasPosibles[$valor]); 
            }
        }

        $this->bolas = array_values($totalDeBolasPosibles);
    }

    /**
     * Devuelve una de las bolas disponibles 
     * 
     * Devuelve uno de los números del atributo (array) $bolas al azar, lo anota en el .txt para no volver a incluir dicho número en
     * el atributo $bolas al volver a crear otro objeto (esto es porque hay que crear varios objetos de la clase Bombo durante una partida, 
     * así que es necesario almacenar en algún sitio las bolas que han salido en la partida hasta el momento. Al comenzar una partida se 
     * reinician los ficheros .txt).
     *
     * @return int
     */
    public function sacarBola(){

        $numeroDeBolas = count($this->bolas);
        $girarElBombo = rand(0, $numeroDeBolas-1);

        $cogerLaBola = $this->bolas[$girarElBombo];

        $fichero = fopen("./bolas.txt", "ab+");
        fwrite($fichero, $this->bolas[$girarElBombo] . PHP_EOL);
        fclose($fichero);
 
        unset($this->bolas[$girarElBombo]);

        $this->bolas = array_values($this->bolas);

        return $cogerLaBola;
    }
}