<?php

declare(strict_types=1);

class Bombo {
    private array $bolas;

    public function __construct(){
        $bolasDisponibles = array();
        $contadorDeFgets = 0;

        $fichero = fopen("bolas.txt", "rb+");
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
        // for($i = 1; $i <= 90-count($bolasSacadas); $i++){
        //     if($i == 1){
        //         foreach($bolasSacadas as $valor){
        //             if($i == $valor){
        //                 $yaHaSidoSacada = TRUE;
        //             }
        //         }
        //         if(!isset($yaHaSidoSacada)){
        //             $this->bolas = array(1 => "1");
        //         }
        //     }
        //     else{
        //         foreach($bolasSacadas as $valor){
        //             if($i == $valor){
        //                 $yaHaSidoSacada = TRUE;
        //             }
        //         }
        //         if(!isset($yaHaSidoSacada)){
        //             array_push($this->bolas, $i); 
        //         }
        //     }
        //     unset($yaHaSidoSacada);
        // }

        for($i = 1; $i <= 60; $i++){
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
        // $bolasDisponibles = array();
        // foreach($this->bolas as $valor){
        //     array_push($bolasDisponibles, $valor); 
        // }

        // $numeroDeBolas = count($bolasDisponibles);
        $numeroDeBolas = count($this->bolas);
        $girarElBombo = rand(0, $numeroDeBolas-1);

        // $cogerLaBola = $bolasDisponibles[$girarElBombo];
        $cogerLaBola = $this->bolas[$girarElBombo];

        $fichero = fopen("bolas.txt", "ab+");
        fwrite($fichero, $this->bolas[$girarElBombo] . PHP_EOL);
        fclose($fichero);
 
        unset($this->bolas[$girarElBombo]);

        $this->bolas = array_values($this->bolas);

        // foreach($this->bolas as $valor){
        //     if($cogerLaBola == $valor){
        //         $fichero = fopen("bolas.txt", "ab+");
        //         fwrite($fichero, $valor . PHP_EOL);
        //     }
        // }
        // fclose($fichero);
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