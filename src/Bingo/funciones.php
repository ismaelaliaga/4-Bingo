<?php

declare(strict_types=1);

function crearPartida($nombreJ1, $cartonesJ1, $nombreJ2, $cartonesJ2, $nombreJ3, $cartonesJ3,
$nombreJ4, $cartonesJ4){
    $partida = new Bingo("$nombreJ1", $cartonesJ1, "$nombreJ2", $cartonesJ2, "$nombreJ3", $cartonesJ3,
    "$nombreJ4", $cartonesJ4);
    return $partida;
}

function cantarLinea($id){
    require_once ('conexionbd.php');

    $esteCartonHaCantadoLinea = FALSE;
    $fichero = fopen("cantarlinea.txt", "rb+");
    $a = intval(fgets($fichero));
    fclose($fichero);


    if(!empty($a)){
        $esteCartonHaCantadoLinea = TRUE;
    }
    
    $estadoCartonActual = $db->prepare("SELECT `estado` FROM `partida` WHERE `id_carton` = ?"); 
    $estadoCartonActual->bind_param('i', $id); 
    $estadoCartonActual->execute();
    $estadoCartonActual->bind_result($estado);
    $estadoCartonActual->fetch();

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

        $selectIdYNombreJugador = $db->prepare("SELECT `j`.`id_jugador`, `j`.`nombre_jugador` FROM `jugadores` `j`
        INNER JOIN `partida` `p` ON `j`.`id_jugador` = `p`.`id_jugador`
        INNER JOIN `cartones` `c` ON `c`.`id_carton` = `p`.`id_carton`
        WHERE `p`.`id_carton` = ?"); 
        $selectIdYNombreJugador->bind_param('i', $id); 
        $selectIdYNombreJugador->execute();
        $selectIdYNombreJugador->bind_result($idJugador, $nombreJugador);
        $selectIdYNombreJugador->fetch();

        $insertLogBingo = $db->prepare("INSERT INTO `log`(`log`) VALUES(?)");
        $insertLogBingo->bind_param('s', $string); 
        $string = "El jugador $nombreJugador ha cantado bingo en el cartón $id.";
        $insertLogBingo->execute();
        $insertLogBingo->fetch();
        $insertLogBingo->close();

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

    require_once ('conexionbd.php');

    $selectNombreJugador = $db->prepare("SELECT `nombre_jugador` FROM `jugadores` `j`
    INNER JOIN `partida` `p` ON `j`.`id_jugador` = `p`.`id_jugador`
    INNER JOIN `cartones` `c` ON `c`.`id_carton` = `p`.`id_carton`
    WHERE `p`.`id_carton` = ?"); 
    $selectNombreJugador->bind_param('i', $id); 
    $selectNombreJugador->execute();
    $selectNombreJugador->bind_result($nombreJugador);
    $selectNombreJugador->fetch();

    $insertLogLinea = $db->prepare("INSERT INTO `log`(`log`) VALUES(?)");
    $insertLogLinea->bind_param('s', $string); 
    $string = "El jugador $nombreJugador ha cantado línea en el cartón $id.";
    $insertLogLinea->execute();
    $insertLogLinea->fetch();
    $insertLogLinea->close();

    $fichero = fopen("cantarlinea.txt", "ab+");
    fwrite($fichero, 1 . PHP_EOL);
    fclose($fichero);
}


function buscarNumeroEnElCarton(int $numeroBombo, int $idCarton){

    require_once ('conexionbd.php');

    $selectEstado = $db->prepare("SELECT `p`.`estado`, `c`.`numeros` 
    FROM `partida` `p`
    INNER JOIN `cartones` `c` ON `p`.`id_carton` = `c`.`id_carton`
    WHERE `p`.`id_carton` = ?"); 
    $selectEstado->bind_param('i', $idCarton); 
    $selectEstado->execute();
    $selectEstado->bind_result($estado, $numeros);
    $selectEstado->fetch();
    $selectEstado->close();

    $carton = explode(", ", $numeros);

    foreach($carton as $indice => $valor){
        if(intval($valor) == $numeroBombo){

            $posicionACambiar = $indice;
        }
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

        $insertLogTachado = $db->prepare("INSERT INTO `log`(`log`) VALUES(?)"); 
        $insertLogTachado->bind_param('s', $string); 
        $string = "El número $numeroBombo se encuentra en el cartón ".$idCarton;
        $insertLogTachado->execute();
        $insertLogTachado->fetch();
        $insertLogTachado->close();

        $updateEstadoCarton = $db->prepare("UPDATE `partida` SET `estado` = '$nuevoEstado' WHERE `id_carton` = ?");
        $updateEstadoCarton->bind_param('i', $idCarton);
        $updateEstadoCarton->execute();
        $updateEstadoCarton->close();

    }
    else{

        $insertLogNumNoCarton = $db->prepare("INSERT INTO `log`(`log`) VALUES(?)");
        $insertLogNumNoCarton->bind_param('s', $string); 
        $string = "El número $numeroBombo no se encuentra en el cartón {$idCarton}";
        $insertLogNumNoCarton->execute();
        $insertLogNumNoCarton->fetch();
        $insertLogNumNoCarton->close();
    }
}
