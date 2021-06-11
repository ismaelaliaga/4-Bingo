<?php
declare(strict_types=1);
namespace Daw\Bingo;
require_once ('Carton.php');

/**
 * Inserta en la base de datos el nombre, la imagen y los cartones del jugador
 * 
 * @version v1.0
 */
final class Jugador {

    private ?string $nombre;
    private Carton $carton1;
    private ?string $imagen;
    private $carton2;
    private $carton3;

    /**
     * El constructor
     *
     */
    public function __construct($nombre, $numeroCartones,$imagen){
        
        include ('conexionbd.php');

        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $insertNombre = $db->prepare("INSERT INTO `jugadores`(`nombre_jugador`,`imagen_jugador`) VALUES(?,?)");
        $insertNombre->bind_param('ss', $this->nombre, $this->imagen); 
        $insertNombre->execute();
        $insertNombre->close();

        $selectId = $db->prepare("SELECT `id_jugador` FROM `jugadores` WHERE `nombre_jugador` = ?");
        $selectId->bind_param('s', $this->nombre);
        $selectId->bind_result($id); 
        $selectId->execute();
        $selectId->fetch();
        $selectId->close();

        switch($numeroCartones){
            case 1:
                $this->carton1 = new Carton;
                $this->carton2 = null;
                $this->carton3 = null;

                $insertPartida = $db->prepare("INSERT INTO `partida`(`id_jugador`,`id_carton`,`estado`) 
                VALUES(?, ?, ?)");
                $arrayConLosCartones = $this->getCartones();
                $idCarton = $arrayConLosCartones[0]->devolverID();
                $estado = $arrayConLosCartones[0]->obtenerEstado();
                $insertPartida->bind_param('iis', $id, $idCarton, $estado); 
                $insertPartida->execute();
                $insertPartida->fetch();
                $insertPartida->close();

                break;

            case 2:
                $this->carton1 = new Carton;
                $this->carton2 = new Carton;
                $this->carton3 = null;

                $insertPartida = $db->prepare("INSERT INTO `partida`(`id_jugador`,`id_carton`,`estado`) 
                VALUES(?, ?, ?)");
                $arrayConLosCartones = $this->getCartones();
                $idCarton = $arrayConLosCartones[0]->devolverID();
                $estado = $arrayConLosCartones[0]->obtenerEstado();
                $insertPartida->bind_param('iis', $id, $idCarton, $estado); 
                $insertPartida->execute();
                $insertPartida->fetch();

                $idCarton = $arrayConLosCartones[1]->devolverID();
                $estado = $arrayConLosCartones[1]->obtenerEstado();
                $insertPartida->execute();
                $insertPartida->fetch();
                $insertPartida->close();

                break;
            case 3:
                $this->carton1 = new Carton;
                $this->carton2 = new Carton;
                $this->carton3 = new Carton;

                $insertPartida = $db->prepare("INSERT INTO `partida`(`id_jugador`,`id_carton`,`estado`) 
                VALUES(?, ?, ?)");
                $arrayConLosCartones = $this->getCartones();
                $idCarton = $arrayConLosCartones[0]->devolverID();
                $estado = $arrayConLosCartones[0]->obtenerEstado();
                $insertPartida->bind_param('iis', $id, $idCarton, $estado); 
                $insertPartida->execute();
                $insertPartida->fetch();

                $idCarton = $arrayConLosCartones[1]->devolverID();
                $estado = $arrayConLosCartones[1]->obtenerEstado();
                $insertPartida->execute();
                $insertPartida->fetch();

                $idCarton = $arrayConLosCartones[2]->devolverID();
                $estado = $arrayConLosCartones[2]->obtenerEstado();
                $insertPartida->execute();
                $insertPartida->fetch();
                $insertPartida->close();
                
                break;
        }
        $db->close();
    }

    /**
     * Devuelve el atributo nombre del objeto
     * 
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Devuelve los cartones del objeto
     * 
     * @return array
     */
    public function getCartones(){
        $array = array($this->carton1,$this->carton2,$this->carton3);
        return $array;
    }

}