<?php

declare(strict_types=1);

namespace Daw\Bingo;



final class Bombo {
    private array $bolas;

    public function __construct(){
        //$bolasDisponibles no se utiliza??
        // $bolasDisponibles = array();
        $contadorDeFgets = 0;

        $fichero = fopen(__DIR__ . "/bolas.txt", "rb+");
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

    public function sacarBola(){

        $numeroDeBolas = count($this->bolas);
        $girarElBombo = rand(0, $numeroDeBolas-1);

        $cogerLaBola = $this->bolas[$girarElBombo];

        $fichero = fopen("bolas.txt", "ab+");
        fwrite($fichero, $this->bolas[$girarElBombo] . PHP_EOL);
        fclose($fichero);
 
        unset($this->bolas[$girarElBombo]);

        $this->bolas = array_values($this->bolas);

        return $cogerLaBola;
    }
}