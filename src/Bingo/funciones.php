<?php

declare(strict_types=1);

function crearPartida($nombreJ1, $cartonesJ1, $imagenJ1, $nombreJ2, $cartonesJ2,$imagenJ2, $nombreJ3, $cartonesJ3, $imagenJ3,
$nombreJ4, $cartonesJ4, $imagenJ4){
    $partida = new Bingo("$nombreJ1", $cartonesJ1, $imagenJ1, "$nombreJ2", $cartonesJ2,$imagenJ2, "$nombreJ3", $cartonesJ3, $imagenJ3,
    "$nombreJ4", $cartonesJ4, $imagenJ4);
    return $partida;
}

function cantarLinea($id){
    include ('./conexionbd.php');

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
    $estadoCartonActual->close();

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
        $selectIdYNombreJugador->close();

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

    include ('./conexionbd.php');

    $selectNombreJugador = $db->prepare("SELECT `nombre_jugador` FROM `jugadores` `j`
    INNER JOIN `partida` `p` ON `j`.`id_jugador` = `p`.`id_jugador`
    INNER JOIN `cartones` `c` ON `c`.`id_carton` = `p`.`id_carton`
    WHERE `p`.`id_carton` = ?"); 
    $selectNombreJugador->bind_param('i', $id); 
    $selectNombreJugador->execute();
    $selectNombreJugador->bind_result($nombreJugador);
    $selectNombreJugador->fetch();
    $selectNombreJugador->close();
    
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

    include ('./conexionbd.php');

    $selectNombreJugador = $db->prepare("SELECT `nombre_jugador` FROM `jugadores` `j`
    INNER JOIN `partida` `p` ON `j`.`id_jugador` = `p`.`id_jugador`
    INNER JOIN `cartones` `c` ON `c`.`id_carton` = `p`.`id_carton`
    WHERE `p`.`id_carton` = ?"); 
    $selectNombreJugador->bind_param('i', $idCarton); 
    $selectNombreJugador->execute();
    $selectNombreJugador->bind_result($nombreJugador);
    $selectNombreJugador->fetch();
    $selectNombreJugador->close();

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
        $string = "El jugador $nombreJugador tacha el número <b>$numeroBombo</b> en el cartón $idCarton";
        $insertLogTachado->execute();
        $insertLogTachado->fetch();
        $insertLogTachado->close();

        $updateEstadoCarton = $db->prepare("UPDATE `partida` SET `estado` = '$nuevoEstado' WHERE `id_carton` = ?");
        $updateEstadoCarton->bind_param('i', $idCarton);
        $updateEstadoCarton->execute();
        $updateEstadoCarton->close();

    }
    
}

function reiniciarPartida(){

    include ('./conexionbd.php');

    $ficheroCartones = fopen("cartones.txt", "w+");
    fclose($ficheroCartones);

    $ficheroBolas = fopen("bolas.txt", "w+");
    fclose($ficheroBolas);

    $ficherocantarlinea = fopen("cantarlinea.txt", "w+");
    fclose($ficherocantarlinea);

    $truncateLog = $db->prepare("TRUNCATE `log`");
    $truncateLog->execute();
    $truncateLog->close();

    $truncatePartida = $db->prepare("TRUNCATE `partida`");
    $truncatePartida->execute();
    $truncatePartida->close();

    $deleteJugadores = $db->prepare("DELETE FROM `jugadores` WHERE `jugadores`.`id_jugador` = ?");
    $deleteJugadores->bind_param('i', $id); 
    for($i=1;$i<=4;$i++){
        $id=$i;
        $deleteJugadores->execute();
    }
    $deleteJugadores->close();

    $alterAutoIncrement = $db->prepare("ALTER TABLE `jugadores` AUTO_INCREMENT = 1");
    $alterAutoIncrement->execute();
    $alterAutoIncrement->close();

    
}

function obtenerLog($db)
{

    $logSelect = $db->prepare("SELECT `log` FROM `log`;"); 
    $logSelect->execute();
    return $logSelect;
}

function obtenerEstadoCarton($db, $idJugador)
{

    $cartonesSelect = $db->prepare("SELECT `estado_default` FROM `partida` where `id_jugador` = $idJugador  ;"); 
    $cartonesSelect->execute();
    return $cartonesSelect;
}

function obtenerEstructuraCarton($db, $idJugador)
{

    $estructuraSelect = $db->prepare("SELECT `numeros` FROM `cartones` where `id_jugador` = $idJugador  ;"); 
    $estructuraSelect->execute();
    return $estructuraSelect;
}

function obtenerJugador($db, $idJugador){
    $jugadorSelect = $db->prepare("SELECT * FROM `jugadores` WHERE `id_jugador`= $idJugador;");
    $jugadorSelect->execute();
    $jugadorSelect->store_result();
    if($jugadorSelect->num_rows>0){
        return $jugadorSelect;
    }
    return false;
}

function imprimirJugador($nombre, $imagen, $cartonesEstado){
    echo "
        <article class='jugadorContenedor'>
                <img class='imgJugador' src='$imagen'/>
                <h2 class='nombreJugador'>$nombre</h2>
                <section class='cartonesContenedor' id='1'>
    ";
    $cartonesEstado->store_result();
    $cartonesEstado->bind_result($idCarton, $estado);
    for ($i=0; $i < $cartonesEstado->num_rows-1; $i++) { 
        $tachados=0;
        echo "<article class='minicartonContenedor'>
                <table class='minicarton'>
                    <tr>";
        while ($cartonesEstado->fetch()) {
            $estadoArray=explode(", ", $estado);
            if ($estadoArray[$i]==1) {
                $celda="<i class='fas fa-circle'></i>";
                $claseCelda="";
                $tachados++;
            }
            if ($estadoArray[$i]==2) {
                $celda="";
                $claseCelda="nulo";
            }
            echo "<td class=$claseCelda>$celda</td>";
            if ($i==8 || $i==17) {
                echo "</tr><tr>";
            }
            if ($i==26) {
                echo "</tr></table>
                    <h3>$tachados/15</h3>
                </article>";
            }
        }
    }
    echo "</section></article>";
}