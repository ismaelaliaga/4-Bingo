<?php

function cantarLinea($id){
    $esteCartonHaCantadoLinea = FALSE;
    $fichero = fopen("cantarlinea.txt", "rb+");
    $a = intval(fgets($fichero));
    fclose($fichero);


    if(!empty($a)){
        $esteCartonHaCantadoLinea = TRUE;
    }
    
    $servidor= "localhost";
    $user= "root";
    $password= NULL;
    $database= "bingo";

    $db = new mysqli($servidor,$user, $password,$database);

    if($db->connect_error){ 
        die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
    } 

    $sentencia = $db->prepare("SELECT `estado` FROM `partida` WHERE `id_carton` = ?"); 
    $sentencia->bind_param('i', $id); 
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

        $sentencia2 = $db2->prepare("SELECT `j`.`id_jugador`, `j`.`nombre_jugador` FROM `jugadores` `j`
        INNER JOIN `partida` `p` ON `j`.`id_jugador` = `p`.`id_jugador`
        INNER JOIN `cartones` `c` ON `c`.`id_carton` = `p`.`id_carton`
        WHERE `p`.`id_carton` = ?"); 
        $sentencia2->bind_param('i', $id); 
        $sentencia2->execute();
        $sentencia2->bind_result($idJugador, $nombreJugador);
        $sentencia2->fetch();
        
        $db4 = new mysqli($servidor,$user, $password,$database);

        if($db4->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 

        $sentencia4 = $db4->prepare("INSERT INTO `log`(`log`) VALUES(?)");
        $sentencia4->bind_param('s', $string); 
        $string = "El jugador $nombreJugador ha cantado bingo en el cartón $id.";
        $sentencia4->execute();
        $sentencia4->fetch();
        $sentencia4->close();

        return $idJugador;
    }
    elseif($esteCartonHaCantadoLinea == FALSE){
        foreach($estadoCarton[0] as $valor){
            if($valor == 0){
                $cantarLinea = FALSE;
            }
        }
        
        if($cantarLinea == TRUE){
            cantarLineaEnBD($id);
        }
        elseif($cantarLinea == FALSE){
            $cantarLinea = TRUE;

            foreach($estadoCarton[1] as $valor){
                if($valor == 0){
                    $cantarLinea = FALSE;
                }
            }

            if($cantarLinea == TRUE){
                cantarLineaEnBD($id);
            }
        }
        elseif($cantarLinea == FALSE){
            $cantarLinea == TRUE;
            foreach($estadoCarton[2] as $valor){
                if($valor == 0){
                    $cantarLinea = FALSE;
                }
            }

            if($cantarLinea == TRUE){
                cantarLineaEnBD($id);
            }
        }
        else{
            return FALSE;
        }
    }
    else{
        return FALSE;
    }
}

function cantarLineaEnBD($id){
    // $id = intval($id);
    $servidor= "localhost";
    $user= "root";
    $password= NULL;
    $database= "bingo";

    $db3 = new mysqli($servidor,$user, $password,$database);

    if($db3->connect_error){ 
        die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
    } 

    $sentencia3 = $db3->prepare("SELECT `nombre_jugador` FROM `jugadores` `j`
    INNER JOIN `partida` `p` ON `j`.`id_jugador` = `p`.`id_jugador`
    INNER JOIN `cartones` `c` ON `c`.`id_carton` = `p`.`id_carton`
    WHERE `p`.`id_carton` = ?"); 
    $sentencia3->bind_param('i', $id); 
    $sentencia3->execute();
    $sentencia3->bind_result($nombreJugador);
    $sentencia3->fetch();

    $db2 = new mysqli($servidor,$user, $password,$database);

    if($db2->connect_error){ 
        die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
    } 

    $sentencia2 = $db2->prepare("INSERT INTO `log`(`log`) VALUES(?)");
    $sentencia2->bind_param('s', $string); 
    $string = "El jugador $nombreJugador ha cantado línea en el cartón $id.";
    $sentencia2->execute();
    $sentencia2->fetch();
    $sentencia2->close();

    $fichero = fopen("cantarlinea.txt", "ab+");
    fwrite($fichero, 1 . PHP_EOL);
    fclose($fichero);
}


function buscarNumeroEnElCarton(int $numeroBombo, int $idCarton){
    $servidor= "localhost";
    $user= "root";
    $password= NULL;
    $database= "bingo";

    $db = new mysqli($servidor,$user, $password,$database);

    if($db->connect_error){ 
        die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
    } 

    $sentencia = $db->prepare("SELECT `p`.`estado`, `c`.`numeros` 
    FROM `partida` `p`
    INNER JOIN `cartones` `c` ON `p`.`id_carton` = `c`.`id_carton`
    WHERE `p`.`id_carton` = ?"); 
    $sentencia->bind_param('i', $idCarton); 
    $sentencia->execute();
    $sentencia->bind_result($estado, $numeros);
    $sentencia->fetch();
    $sentencia->close();

    $carton = explode(", ", $numeros);

    foreach($carton as $indice => $valor){
        if(intval($valor) == $numeroBombo){
            // echo"El número $numero está en este cartón";
            $posicionACambiar = $indice;
        }
        // else{
        //     echo "El número $numero no es igual al número $valor</br>";
        // }
    }

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
        $string = "El número $numeroBombo se encuentra en el cartón ".$idCarton;
        // $sentencia->bind_param('s', $this->id); 
        $sentencia2->execute();
        // $sentencia->bind_result($estado);
        $sentencia2->fetch();
        $sentencia2->close();

        $db3 = new mysqli($servidor,$user, $password,$database);

        $sentencia3 = $db3->prepare("UPDATE `partida` SET `estado` = '$nuevoEstado' WHERE `id_carton` = ?");
        $sentencia3->bind_param('i', $idCarton);
        $sentencia3->execute();
        $sentencia3->close();

    }
    else{
        $db4 = new mysqli($servidor,$user, $password,$database);

        $sentencia4 = $db4->prepare("INSERT INTO `log`(`log`) VALUES(?)");
        $sentencia4->bind_param('s', $string); 
        $string = "El número $numeroBombo no se encuentra en el cartón {$idCarton}";
        // $sentencia->bind_param('s', $this->id); 
        $sentencia4->execute();
        // $sentencia->bind_result($estado);
        $sentencia4->fetch();
        $sentencia4->close();
    }
}
