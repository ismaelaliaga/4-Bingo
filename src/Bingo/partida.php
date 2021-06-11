<?php
declare(strict_types=1);
namespace Daw\Bingo;
require_once ('./Bombo.php');
include_once('funciones.php');
include('./conexionbd.php');
$tirada=0;
$ganador="";
if (isset($_POST['sacarBola'])) {
    $tirada++;
    $bombo = new Bombo;
    $bola = $bombo->sacarBola();
    $sentencia = $db->prepare("SELECT `id_carton` FROM `partida`");
    $sentencia->execute();
    $sentencia->bind_result($numeros);
    while($sentencia->fetch()){
        buscarNumeroEnElCarton($bola, $numeros);
        $isBingo=cantarLinea($numeros);
        if ($isBingo!=FALSE) {
            $ganador=$isBingo;
        }
    }
    escribirBolaLog($bola);
}
if (isset($_POST['finalizarBoton'])) {
    finalizarPartida($db);
    header("location: seleccion.php");
}
$jugador1=obtenerJugador($db, 1);
$jugador2=obtenerJugador($db, 2);
$jugador3=obtenerJugador($db, 3);
$jugador4=obtenerJugador($db, 4);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/estilosPartida.css">
    <link href="../../css/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <title>Bingo</title>
</head>
<body>
    <header>
        <nav id="menu">
                <ul>
                    <li><img id="logoMenu" src="../../img/logot.png"/></li>
                    <form method="post" id="formMenu">
                        <li><button class="botonMenu" name="finalizarBoton">Finalizar</button></li>
                    </form>
                </ul>
        </nav>
    </header>
    <main>
        <section id="tablero">
            <span>Tirada <?php ContadorTiradas(); ?></span>
            <div class="container">
                <h2 class="front">
                    <?php
                        if (isset($bola)) {
                            echo $bola;
                        }
                    ?>
                </h2>
                <h2 class="back"><img  class="logo" src="../../img/logot.png"></h2>
            </div>
            </h2>
            <?php
                if ($ganador=="") {
                    echo "<form method=post>
                            <button id=sacarBolaBoton name=sacarBola>Sacar bola</button>
                        </form>";
                }
            ?>
        </section>
        <div id="ventanaLogContenedor">
            <section id="ventanaLog">
            <ul>
                <li>¡Bienvenidos a la partida! ¡Buena suerte!</li>
                    <?php imprimirLog($db);?>
            </ul>
            </section>
        </div>
        <section class="jugadores jugadoresTop">
            <?php 
                if ($jugador1!=false) {
                    $cartonesEstadoJ1=obtenerEstadoCarton($db, 1);
                    $jugador1->bind_result($id, $nombre, $imagen);
                    $jugador1->fetch();
                    imprimirJugador($nombre, $imagen, $id, $cartonesEstadoJ1);
                }
                if ($jugador2!=false) {
                    $cartonesEstadoJ2=obtenerEstadoCarton($db, 2);
                    $jugador2->bind_result($id, $nombre, $imagen);
                    $jugador2->fetch();
                    imprimirJugador($nombre, $imagen, $id, $cartonesEstadoJ2);
                }
            ?>

        </section>
        <section class="jugadores jugadoresBottom">
            <?php 
                if ($jugador3!=false) {
                    $cartonesEstadoJ3=obtenerEstadoCarton($db, 3);
                    $jugador3->bind_result($id, $nombre, $imagen);
                    $jugador3->fetch();
                    imprimirJugador($nombre, $imagen, $id, $cartonesEstadoJ3);
                }
                if ($jugador4!=false) {
                    $cartonesEstadoJ4=obtenerEstadoCarton($db, 4);
                    $jugador4->bind_result($id, $nombre, $imagen);
                    $jugador4->fetch();
                    imprimirJugador($nombre, $imagen, $id, $cartonesEstadoJ4);
                }               
            ?>
        </section>
        <section id="cartonesModalContenedor">
            <?php
                imprimirCartones($db, 1);
                imprimirCartones($db, 2);
                imprimirCartones($db, 3);
                imprimirCartones($db, 4);
            ?>
        </section>
        <?php
            if ($ganador!="") {
            echo "<section id=mensajeGanadorContenedor>
                    <article id=mensajeGanador>
                        <h3>¡$ganador ha ganado!</h3>
                        <form method=post id=formFinalPartida>
                            <button class=botonMenu name=finalizarBoton>Finalizar partida</button>
                            <div class=botonCerrarMensajeFinal>Cerrar</div>
                        </form>
                    </article>
                </section>";
            }
        ?>
    </main>
</body>
<script type="text/javascript" src="../../js/partida_comportamiento.js"></script>
</html>