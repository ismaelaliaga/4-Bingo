<?php

declare(strict_types=1);
require_once ('Carton.php');

final class Jugador {
    // private static $id;
    private string $nombre;
    private Carton $carton1;
    private $carton2;
    private $carton3;

    public function __construct($nombre, $numeroCartones){
        $this->nombre = $nombre;

        $servidor= "localhost";
        $user= "root";
        $password= NULL;
        $database= "bingo";

        $db = new mysqli($servidor,$user, $password,$database);

        if($db->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 

        $sentencia = $db->prepare("INSERT INTO `jugadores`(`nombre_jugador`) VALUES(?)");
        $sentencia->bind_param('s', $this->nombre); 
        $sentencia->execute();
        $sentencia->close();
        $sentencia2 = $db->prepare("SELECT `id_jugador` FROM `jugadores` WHERE `nombre_jugador` = ?");
        $sentencia2->bind_param('s', $this->nombre);
        $sentencia2->bind_result($id); 
        $sentencia2->execute();
        $sentencia2->fetch();
        $sentencia2->close();

        switch($numeroCartones){
            case 1:
                $this->carton1 = new Carton;
                $this->carton2 = null;
                $this->carton3 = null;

                $sentencia = $db->prepare("INSERT INTO `partida`(`id_jugador`,`id_carton`,`estado`) 
                VALUES(?, ?, ?)");
                $arrayConLosCartones = $this->getCartones();
                $idCarton = $arrayConLosCartones[0]->devolverID();
                $estado = $arrayConLosCartones[0]->obtenerEstado();
                var_dump($idCarton);
                $sentencia->bind_param('iis', $id, $idCarton, $estado); 
                $sentencia->execute();
                $sentencia->fetch();
                $sentencia->close();
                $db->close();
                break;

            case 2:
                $this->carton1 = new Carton;
                $this->carton2 = new Carton;
                $this->carton3 = null;

                $sentencia = $db->prepare("INSERT INTO `partida`(`id_jugador`,`id_carton`,`estado`) 
                VALUES(?, ?, ?)");
                $arrayConLosCartones = $this->getCartones();
                $idCarton = $arrayConLosCartones[0]->devolverID();
                $estado = $arrayConLosCartones[0]->obtenerEstado();
                var_dump($idCarton);
                $sentencia->bind_param('iis', $id, $idCarton, $estado); 
                $sentencia->execute();
                $sentencia->fetch();

                $idCarton = $arrayConLosCartones[1]->devolverID();
                $estado = $arrayConLosCartones[1]->obtenerEstado();
                $sentencia->execute();
                $sentencia->fetch();
                $sentencia->close();
                $db->close();


                // $this->carton3 = new stdClass;
                break;
            case 3:
                $this->carton1 = new Carton;
                $this->carton2 = new Carton;
                $this->carton3 = new Carton;

                $sentencia = $db->prepare("INSERT INTO `partida`(`id_jugador`,`id_carton`,`estado`) 
                VALUES(?, ?, ?)");
                $arrayConLosCartones = $this->getCartones();
                $idCarton = $arrayConLosCartones[0]->devolverID();
                $estado = $arrayConLosCartones[0]->obtenerEstado();
                var_dump($idCarton);
                $sentencia->bind_param('iis', $id, $idCarton, $estado); 
                $sentencia->execute();
                $sentencia->fetch();

                $idCarton = $arrayConLosCartones[1]->devolverID();
                $estado = $arrayConLosCartones[1]->obtenerEstado();
                $sentencia->execute();
                $sentencia->fetch();

                $idCarton = $arrayConLosCartones[2]->devolverID();
                $estado = $arrayConLosCartones[2]->obtenerEstado();
                $sentencia->execute();
                $sentencia->fetch();
                $sentencia->close();
                $db->close();


                break;
        }
    }

    public function getNombre(){
        return $this->nombre;
    }


    public function getCartones(){
        $array = array($this->carton1,$this->carton2,$this->carton3);
        return $array;
    }

    public function cantarLinea(){

    }
}

// $jugador = new Jugador("pepe",1);
// $carton = $jugador->getCartones();
// $carton[0]->asignarID(5);
// $carton[0]->buscarNumeroEnElCarton(70);
// $jugador = new Jugador("qwrqrw",2);
// var_dump($jugador);