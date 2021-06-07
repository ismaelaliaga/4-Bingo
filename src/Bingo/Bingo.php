<?php

declare(strict_types=1);
require_once ('Jugador.php');

class Bingo {
    private $jugador1;
    private $jugador2;
    private $jugador3;
    private $jugador4;

    public function __construct($nombreJ1, $cartonesJ1, $nombreJ2, $cartonesJ2, $nombreJ3, $cartonesJ3,
    $nombreJ4, $cartonesJ4){
        $this->jugador1 = new Jugador($nombreJ1, $cartonesJ1);
        $this->jugador2 = new Jugador($nombreJ2, $cartonesJ2);
        $this->jugador3 = new Jugador($nombreJ3, $cartonesJ3);
        $this->jugador4 = new Jugador($nombreJ4, $cartonesJ4);
    }

    
}

$bingo = new Bingo("Pepe",1,"María",2,"Antonio",3,"Sandra",1);
var_dump($bingo);