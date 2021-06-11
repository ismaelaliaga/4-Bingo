<?php

declare(strict_types=1);
namespace Daw\Bingo;
require_once ('Jugador.php');
/**
 * Crea todos los objetos necesarios para insertarlos en la base de datos
 * 
 * Los atributos Jugador son objetos que a su vez tienen como atributos objetos de la clase carton.
 * 
 * @version v1.0
 */
final class Bingo {
    private Jugador $jugador1;
    private Jugador $jugador2;
    private Jugador $jugador3;
    private Jugador $jugador4;

    /**
     * El constructor
     *
     */
    public function __construct($nombreJ1, $cartonesJ1,$imagenJ1, $nombreJ2, $cartonesJ2,$imagenJ2, $nombreJ3, $cartonesJ3,
    $imagenJ3,$nombreJ4, $cartonesJ4,$imagenJ4){
        $this->jugador1 = new Jugador($nombreJ1, $cartonesJ1,$imagenJ1);
        $this->jugador2 = new Jugador($nombreJ2, $cartonesJ2,$imagenJ2);
        $this->jugador3 = new Jugador($nombreJ3, $cartonesJ3,$imagenJ3);
        $this->jugador4 = new Jugador($nombreJ4, $cartonesJ4,$imagenJ4);
    }

    /**
     * Devuelve uno de los jugadores del objeto
     * 
     * @return Jugador
     */
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

    /**
     * Devuelve todos los jugadores del objetos
     * 
     * @return array
     */
    public function getJugadores(){
        $array = array($this->jugador1,$this->jugador2,$this->jugador3,$this->jugador4);
        return $array;
    }
}