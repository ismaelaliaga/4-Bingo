<?php

declare(strict_types=1);
namespace Daw\Bingo;


class Bombo {
    private array $bolas;

    public function __construct($string){
        $bolasSacadas = explode(" ", $string);
        $this->bolas = array();
        for($i = 1; $i <= 90-count($bolasSacadas); $i++){
            if($i == 1){
                foreach($bolasSacadas as $valor){
                    if($i == $valor){
                        $yaHaSidoSacada = TRUE;
                    }
                }
                if(!isset($yaHaSidoSacada)){
                    $this->bolas = array(1 => "1");
                }
            }
            else{
                foreach($bolasSacadas as $valor){
                    if($i == $valor){
                        $yaHaSidoSacada = TRUE;
                    }
                }
                if(!isset($yaHaSidoSacada)){
                    array_push($this->bolas, $i); 
                }
            }
            unset($yaHaSidoSacada);
        }
        return true;
    }

    public function sacarBola(){
        $bolasDisponibles = array();
        foreach($this->bolas as $valor){
            array_push($bolasDisponibles, $valor); 
        }

        $numeroDeBolas = count($bolasDisponibles);
        $girarElBombo = rand(0, $numeroDeBolas);

        $cogerLaBola = $bolasDisponibles[$girarElBombo];

        foreach($this->bolas as $valor){
            if($cogerLaBola == $valor){
                $fichero = fopen("bolas.txt", "ab+");
                fwrite($fichero, $valor . PHP_EOL);
            }
        }
        fclose($fichero);
        return $cogerLaBola;
    }

}

// $bombo = new Bombo;
// print_r($bombo);

// echo $bombo->sacarBola();
// print_r($bombo);

// $string = "";
// $fichero = fopen("bolas.txt", "rb+");
// while($a = fgets($fichero)){
//     $string = $string . " " . $a;
// }


// $bombo = new Bombo($string);
// print_r($bombo);
// fwrite($fichero, $valor);

// echo $bombo->sacarBola();