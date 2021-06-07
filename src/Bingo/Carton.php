<?php

declare(strict_types=1);

class Carton {
    private array $cartones;
    private array $carton;
    private int $id;
    const CARTONES = 60;


    public function __construct(){
        $string = "";
        $fichero = fopen("cartones.txt", "rb+");
        while($a = fgets($fichero)){
            $string = $string . " " . $a;
        }

        $CartonesSacados = explode(" ", $string);
        $cartonesDisponibles = array();
        for($i = 1; $i <= 60-count($CartonesSacados); $i++){
            if($i == 1){
                foreach($CartonesSacados as $valor){
                    if($i == $valor){
                        $yaHaSidoSacado = TRUE;
                    }
                }
                if(!isset($yaHaSidoSacado)){
                    $cartonesDisponibles = array(1 => "1");
                }
            }
            else{
                foreach($CartonesSacados as $valor){
                    if($i == $valor){
                        $yaHaSidoSacado = TRUE;
                    }
                }
                if(!isset($yaHaSidoSacado)){
                    array_push($cartonesDisponibles, $i); 
                }
            }
            unset($yaHaSidoSacado);
        }

        $numeroDeCartones = count($cartonesDisponibles);
        $cogerUnCarton = rand(0, $numeroDeCartones);

        $idDelCarton = $cartonesDisponibles[$cogerUnCarton];
        $this->id = $idDelCarton;
        // $cartones = array();


        $fichero = fopen("cartones.txt", "ab+");
        fwrite($fichero, $idDelCarton . PHP_EOL);
        fclose($fichero);

        for($i = 1; $i <= self::CARTONES; $i++){
            if($i == 1){
                $cartones = array(1 => "1");
            }
            else{
                array_push($cartones, $i);
            }
        }

        $servidor= "localhost";
        $user= "root";
        $password= NULL;
        $database= "bingo";

        $db = new mysqli($servidor,$user, $password,$database);

        if($db->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 

        $sentencia = $db->prepare("SELECT `numeros` FROM `cartones` WHERE `id_carton` = $idDelCarton"); 
        $sentencia->execute();
        $sentencia->bind_result($numeros);
        $sentencia->fetch();
            
        $arrayDeNumeros = explode(", ", $numeros);

        $this->carton[0] = array();
        $this->carton[1] = array();
        $this->carton[2] = array();

        foreach($arrayDeNumeros as $indice => $value){
            if($indice <= 8){
                array_push($this->carton[0], "$value");
            }
            elseif($indice > 8 && $indice <= 17){
                array_push($this->carton[1], "$value");
            }
            else{
                array_push($this->carton[2], "$value");
            }
        }
        

        //Cerramos conexiones 
        $sentencia->close(); 

        $db->close(); 
    }

    public function devolverID(){
        return $this->id;
    }
}

$a = new Carton;
echo $a->devolverID();
print_r($a);
