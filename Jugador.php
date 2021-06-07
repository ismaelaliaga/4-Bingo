<?php

declare(strict_types=1);
require_once ('Carton.php');

class Jugador {
    private string $nombre;
    private $carton1;
    private $carton2;
    private $carton3;

    public function __construct($nombre, $numeroCartones){
        $this->nombre = $nombre;
        switch($numeroCartones){
            case 1:
                $this->carton1 = new Carton;
                $this->carton2 = NULL;
                $this->carton3 = NULL;
                break;
            case 2:
                $this->carton1 = new Carton;
                $this->carton2 = new Carton;
                $this->carton3 = NULL;
                break;
            case 3:
                $this->carton1 = new Carton;
                $this->carton2 = new Carton;
                $this->carton3 = new Carton;
                break;
        }
    }


}

$jugador = new Jugador("pepe",3);
var_dump($jugador);