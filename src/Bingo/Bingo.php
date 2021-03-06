<?php

declare(strict_types=1);
require_once ('Jugador.php');

final class Bingo {
    private Jugador $jugador1;
    private Jugador $jugador2;
    private Jugador $jugador3;
    private Jugador $jugador4;

    public function __construct($nombreJ1, $cartonesJ1, $nombreJ2, $cartonesJ2, $nombreJ3, $cartonesJ3,
    $nombreJ4, $cartonesJ4){
        $this->jugador1 = new Jugador($nombreJ1, $cartonesJ1);
        $this->jugador2 = new Jugador($nombreJ2, $cartonesJ2);
        $this->jugador3 = new Jugador($nombreJ3, $cartonesJ3);
        $this->jugador4 = new Jugador($nombreJ4, $cartonesJ4);
    }

    public function getJugador($jugador){
        switch($jugador){
            case 1:
                return $this->jugador1;
                break;
            case 2:
                return $this->jugador2;
                break;
            case 3:
                return $this->jugador3;
                break;
            case 4:
                return $this->jugador4;
                break;
        }
    }

    public function getJugadores(){
        $array = array($this->jugador1,$this->jugador2,$this->jugador3,$this->jugador4);
        return $array;
    }

    public function comenzarPartida(){
        
    }
}

// $bingo = new Bingo("Pepe",3,"María",2,"Antonio",3,"Sandra",1);
// $jugador = $bingo->getJugador(1);
// $cartones = $jugador->getCartones();
// $cartones[0];
// $cartones[1];
// $cartones[2];
// var_dump($cartones); 
