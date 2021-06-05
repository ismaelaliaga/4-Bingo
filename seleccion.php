<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/icono.ico" type="image/x-icon">
    <title>Bingo!</title>
</head>
<body>
<div class="cuerpo">
  <header class="cabecera">Header</header>
  <article class="main">
  <form method="POST">
  <input class="botons" type="submit" value="Registrar">

    <ul class="jugadoresSeleccion">

        <ul class="form-register" >
        <li><span> </span></li>
        <li> <img class="marco" id="prueba"  src="./img/jugadores/0.jpg" height="250px"></li>
        <li><span class="seleccion" id="seleccion1">Seleccionar imagen</span>
        <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                <span class="close">x</span>
        <?php
            for($i=0;$i<=4;$i++)
            {
              echo "<img class=imagenes data-ruta=./img/jugadores/$i.jpg width=220px height=220px src=./img/jugadores/$i.jpg>";
            }
        ?>

        </div>
        </div>
        </li>


        <li><input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select">
        <option value="value1" selected>1</option>
        <option value="value2" >2</option>
        <option value="value3">3</option>
        </select>
        </li>
        <li>Aleatorio</li>
        </ul>

     
        <ul class="form-register oculto" id="jugador1">
        <li><span class="cerrar" id="cerrar1">X</span></li> 
        <li> <img class="marco"  src="./img/jugadores/0.jpg" height="250px"></li>
        <li><span class="seleccion" id="seleccion1">Seleccionar imagen</span>
        <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                <span class="close">x</span>
        <?php
            for($i=0;$i<=4;$i++)
            {
              echo "<img class=imagenes data-ruta=./img/jugadores/$i.jpg width=220px height=220px src=./img/jugadores/$i.jpg>";
            }
        ?>

        </div>
        </div>
        </li>
        <li><input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select">
        <option value="value1" selected>1</option>
        <option value="value2" >2</option>
        <option value="value3">3</option>
        </select>
        </li>
        <li>Aleatorio</li>
        </ul>

       
        <ul class="form-register oculto" id="jugador2">
        <li><span class="cerrar" id="cerrar2">X</span></li> 
        <li> <img class="marco"  src="./img/jugadores/0.jpg" height="250px"></li>
        <li><span class="seleccion" id="seleccion1">Seleccionar imagen</span>
        <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                <span class="close">x</span>
        <?php
            for($i=0;$i<=4;$i++)
            {
              echo "<img class=imagenes data-ruta=./img/jugadores/$i.jpg width=220px height=220px src=./img/jugadores/$i.jpg>";
            }
        ?>

        </div>
        </div>
        </li>
        <li><input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select">
        <option value="value1" selected>1</option>
        <option value="value2" >2</option>
        <option value="value3">3</option>
        </select>
        </li>
        <li>Aleatorio</li>
        </ul>


        <ul class="form-register oculto" id="jugador3">
        <li><span class="cerrar" id="cerrar3">X</span></li> 
        <li> <img class="marco"  src="./img/jugadores/0.jpg" height="250px"></li>
        <li><span class="seleccion" id="seleccion1">Seleccionar imagen</span>
        <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                <span class="close">x</span>
        <?php
            for($i=0;$i<=4;$i++)
            {
              echo "<img class=imagenes data-ruta=./img/jugadores/$i.jpg width=220px height=220px src=./img/jugadores/$i.jpg>";
            }
        ?>

        </div>
        </div>
        </li>
        <li><input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select">
        <option value="value1" selected>1</option>
        <option value="value2" >2</option>
        <option value="value3">3</option>
        </select>
        </li>
        <li>Aleatorio</li>
        </ul>

        <ul>
        <li ><div  id="mas" class="mas">+</div></li>
        </ul>
    </ul>
  </form>
    </div>  
  </article>
</div>
<?php

?>
<footer class="footer">Footer</footer>
<script src="./js/script.js"></script>
</body>
</html>