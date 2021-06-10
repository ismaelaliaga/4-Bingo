<?php
declare(strict_types=1);
namespace Daw\Bingo;
require_once ('./Bombo.php');
include_once('funciones.php');
include('./conexionbd.php');
$tirada=0;
if (isset($_POST['sacarBola'])) {
    $tirada++;
    $bombo = new Bombo;
    $bola = $bombo->sacarBola();
    $sentencia = $db->prepare("SELECT `id_carton` FROM `partida`");
    $sentencia->execute();
    $sentencia->bind_result($numeros);
    while($sentencia->fetch()){
        buscarNumeroEnElCarton($bola, $numeros);
        cantarLinea($numeros);
    }
    escribirBolaLog($bola);
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
                        <li><button class="botonMenu">Reiniciar</button></li>
                        <li><button class="botonMenu">Finalizar</button></li>
                    </form>
                </ul>
        </nav>
    </header>
    <main>
        <section id="tablero">
            <span>Tirada <?php echo $tirada; ?></span>
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
            <form method="post">
                <button id="sacarBolaBoton" name="sacarBola">Sacar bola</button>
            </form>
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
                $cartonesEstado=obtenerEstadoCarton($db, 1);
                $jugador1->bind_result($id, $nombre, $imagen);
                $jugador1->fetch();
                imprimirJugador($nombre, $imagen, $id, $cartonesEstado)
            ?>
        </section>
        <section class="jugadores jugadoresBottom">

        </section>
        <section id="cartonesModalContenedor">
            <article class="cartonesJugadorModal" id="-1">
                <i class='fas fa-times-circle botonCerrarCartones'></i>
                <table class="cartonModal">
                    <tr>
                        <td class="celdaOcupada">66</td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada tachado">6</td>
                        <td class="celdaOcupada">6</td>
                        <td class="celdaVacia"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>

                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>


                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>
                </table>

                <table class="cartonModal">
                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>

                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>


                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>
                </table>


                <table class="cartonModal">
                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>

                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>


                    <tr>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                        <td class="celdaOcupada"></td>
                    </tr>
                </table>
            </article>
        </section>
    </main>
</body>
<script type="text/javascript" src="../../js/partida_comportamiento.js"></script>
</html>