<?php

declare(strict_types=1);

final class Carton {
    private array $carton;
    private int $id;
    const CARTONES = 60;


    public function __construct(){
        // $string = "";
        $cartonesDisponibles = array();
        $contadorDeFgets = 0;
        //Abre el fichero para obtener los cartones que no están disponibles, los guarda en $cartonesSacados
        $fichero = fopen("cartones.txt", "rb+");
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

        //Este isset es por si no hay ningún cartón sacado, porque entonces la variable $string no estará definida
        if(isset($string)){
            $cartonesSacados = explode(" ", $string);
        }
        
        //Este for crea un array llamado $totalDeCartonesPosibles con 60 índices, por los 60 cartones posibles
        for($i = 1; $i <= 60; $i++){
            if($i == 1){
                $totalDeCartonesPosibles = array(1 => $i);
            }
            else{
                array_push($totalDeCartonesPosibles, $i);
            }
        }

        //Si hay algún cartón no disponible entra en el isset, y elimina del array que acaba de crear el for de arriba los índices
        //que corresponden a los cartones que no están disponibles
        if(isset($string)){
            foreach($cartonesSacados as $valor){
                unset($totalDeCartonesPosibles[$valor]); 
            }
        }
        
        //La función array_values resetea los índices de un array dándole valores numéricos de 0, 1, 2, etc, por ejemplo un 
        //array("coliflor" => "perro", "lechuga" => "gato") pasará a ser array(0 => "perro, 1 => "gato)
        $cartonesDisponibles = array_values($totalDeCartonesPosibles);

        $numeroDeCartonesDisponibles = count($cartonesDisponibles)-1;
        $cogerUnCarton = rand(0, $numeroDeCartonesDisponibles);
        // $cogerUnCarton = rand(1,4);
        $idDelCarton = $cartonesDisponibles[$cogerUnCarton];
        $this->id = intval($idDelCarton);
        // $this->id = 18;

        $fichero = fopen("cartones.txt", "ab+");
        fwrite($fichero, $idDelCarton . PHP_EOL);
        fclose($fichero);

        $servidor= "localhost";
        $user= "root";
        $password= NULL;
        $database= "bingo";

        $db = new mysqli($servidor,$user, $password,$database);

        if($db->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 

        $sentencia = $db->prepare("SELECT `numeros` FROM `cartones` WHERE `id_carton` = ?");
        $sentencia->bind_param('i', $this->id);
        $sentencia->execute();
        $sentencia->bind_result($numeros);
        $sentencia->fetch();
            
        $arrayDeNumeros = explode(", ", $numeros);

        $this->carton = array();
        foreach($arrayDeNumeros as $valor){
            array_push($this->carton, $valor);
        }
        // $this->carton[0] = array();
        // $this->carton[1] = array();
        // $this->carton[2] = array();

        // foreach($arrayDeNumeros as $indice => $value){
        //     if($indice <= 8){
        //         array_push($this->carton[0], "$value");
        //     }
        //     elseif($indice > 8 && $indice <= 17){
        //         array_push($this->carton[1], "$value");
        //     }
        //     else{
        //         array_push($this->carton[2], "$value");
        //     }
        // }

        //Cerramos conexiones 
        $sentencia->close(); 

        $db->close(); 
    }

    public function devolverID(){
        return $this->id;
    }

    public function buscarNumeroEnElCarton(int $numero){
        $servidor= "localhost";
        $user= "root";
        $password= NULL;
        $database= "bingo";

        $db = new mysqli($servidor,$user, $password,$database);

        if($db->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 

        var_dump($this->carton);
        echo "</br>";
        var_dump($numero);
        foreach($this->carton as $indice => $valor){
            if(intval($valor) == $numero){
                // echo"El número $numero está en este cartón";
                $posicionACambiar = $indice;
            }
            // else{
            //     echo "El número $numero no es igual al número $valor</br>";
            // }
        }

        $sentencia = $db->prepare("SELECT `estado` FROM `partida` WHERE `id_carton` = ?"); 
        $sentencia->bind_param('i', $this->id); 
        $sentencia->execute();
        $sentencia->bind_result($estado);
        $sentencia->fetch();

        if(isset($posicionACambiar)){
            $arrayEstado = explode(", ", $estado);
            $arrayEstado[$posicionACambiar] = 1;
            foreach($arrayEstado as $indice => $valor){
                if($indice == 0){
                    $string = "$valor";
                }
                else{
                    $string = $string .", $valor";
                }
            }

            $nuevoEstado = $string;
            $db2 = new mysqli($servidor,$user, $password,$database);

            $sentencia2 = $db2->prepare("INSERT INTO `log`(`log`) VALUES(?)"); 
            $sentencia2->bind_param('s', $string); 
            $string = "El número $numero se encuentra en el cartón ".$this->id;
            // $sentencia->bind_param('s', $this->id); 
            $sentencia2->execute();
            // $sentencia->bind_result($estado);
            $sentencia2->fetch();

            $db3 = new mysqli($servidor,$user, $password,$database);

            $sentencia3 = $db3->prepare("UPDATE `partida` SET `estado` = '$nuevoEstado' WHERE `id_carton` = ?");
            $sentencia3->bind_param('i', $this->id);
            $sentencia3->execute();
            $sentencia3->close();

        }
        else{
            $db4 = new mysqli($servidor,$user, $password,$database);

            $sentencia4 = $db4->prepare("INSERT INTO `log`(`log`) VALUES(?)");
            $sentencia4->bind_param('s', $string); 
            $string = "El número $numero no se encuentra en el cartón {$this->id}";
            // $sentencia->bind_param('s', $this->id); 
            $sentencia4->execute();
            // $sentencia->bind_result($estado);
            $sentencia4->fetch();
        }
    }

    public function obtenerEstado(){
        $servidor= "localhost";
        $user= "root";
        $password= NULL;
        $database= "bingo";

        $db = new mysqli($servidor,$user, $password,$database);
        
        $sentencia = $db->prepare("SELECT `estado_default` FROM `cartones` WHERE `id_carton` = ?"); 
        $sentencia->bind_param('i', $this->id); 
        $sentencia->execute();
        $sentencia->bind_result($estado);
        $sentencia->fetch();

        return $estado;
    }

    public function asignarID($numero){
        $this->id = $numero;
    }

    public function cantarLinea(){
        $servidor= "localhost";
        $user= "root";
        $password= NULL;
        $database= "bingo";

        $db = new mysqli($servidor,$user, $password,$database);

        if($db->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 

        $sentencia = $db->prepare("SELECT `estado` FROM `partida` WHERE `id_carton` = ?"); 
        $sentencia->bind_param('i', $this->id); 
        $sentencia->execute();
        $sentencia->bind_result($estado);
        $sentencia->fetch();

        $arrayDeNumeros = explode(", ", $estado);
        $estadoCarton[0] = array();
        $estadoCarton[1] = array();
        $estadoCarton[2] = array();

        foreach($arrayDeNumeros as $indice => $value){
            if($indice <= 8){
                array_push($estadoCarton[0], "$value");
            }
            elseif($indice > 8 && $indice <= 17){
                array_push($estadoCarton[1], "$value");
            }
            else{
                array_push($estadoCarton[2], "$value");
            }
        }

        $cantarLinea = $cantarBingo = TRUE;

        foreach($arrayDeNumeros as $valor){
            if($valor == 0){
                $cantarBingo = FALSE;
            }
        }

        if($cantarBingo == TRUE){
            $db2 = new mysqli($servidor,$user, $password,$database);

            if($db2->connect_error){ 
                die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
            } 
    
            $sentencia2 = $db2->prepare("SELECT `id_jugador` FROM `partida` WHERE `id_carton` = ?"); 
            $sentencia2->bind_param('i', $this->id); 
            $sentencia2->execute();
            $sentencia2->bind_result($idJugador);
            $sentencia2->fetch();

            $db3 = new mysqli($servidor,$user, $password,$database);

            if($db3->connect_error){ 
                die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
            } 
    
            $sentencia3 = $db3->prepare("SELECT `nombre_jugador` FROM `jugadores` WHERE `id_jugador` = ?"); 
            $sentencia3->bind_param('i', $idJugador); 
            $sentencia3->execute();
            $sentencia3->bind_result($nombreJugador);
            $sentencia3->fetch();
            
            $db4 = new mysqli($servidor,$user, $password,$database);

            if($db4->connect_error){ 
                die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
            } 

            $sentencia4 = $db4->prepare("INSERT INTO `log`(`log`) VALUES(?)");
            $sentencia4->bind_param('s', $string); 
            $string = "El jugador $nombreJugador ha cantado bingo en el cartón {$this->id}.";
            $sentencia4->execute();
            $sentencia4->fetch();
            $sentencia4->close();
        }
        else{
            foreach($estadoCarton[0] as $valor){
                if($valor == 0){
                    $cantarLinea = FALSE;
                }
            }
            
            if($cantarLinea == TRUE){
                cantarLineaEnBD();
            }
            elseif($cantarLinea == FALSE){
                $cantarLinea = TRUE;

                foreach($estadoCarton[1] as $valor){
                    if($valor == 0){
                        $cantarLinea = FALSE;
                    }
                }

                if($cantarLinea == TRUE){
                    cantarLineaEnBD();
                }
            }
            else{
                $cantarLinea == TRUE;
                foreach($estadoCarton[2] as $valor){
                    if($valor == 0){
                        $cantarLinea = FALSE;
                    }
                }

                if($cantarLinea == TRUE){
                    cantarLineaEnBD();
                }
            }
        }
    }
}

// $a = new Carton;
// $a->buscarNumeroEnElCarton(5);
// print_r($a);
// $a = new Carton;
// echo $a->devolverID();
// print_r($a);
