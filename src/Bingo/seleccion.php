<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/seleccion.css">
    <link rel="shortcut icon" href="../../img/icono.ico" type="image/x-icon">
    <title>Bingo!</title>
</head>
<body>
<div class="cuerpo">
  <header class="cabecera">
    <nav class="navegador">
      <ul>
      <li><img src="../../img/logot.png" class="cabecera_img"></li>
      </ul>
      <ul>
        <li><h1 class="tittle">Selección de jugadores</h1></li>
      </ul>
      <ul>
        <li><a  class="salir" href="./index.html">Salir</a></li>
      </ul>
    </nav>
  </header>
  <article class="main">
  <form method="POST">
  <input class=" botones" type="submit" value="Registrar">
  <div class="botones"  id="aleatorios">Todos Aleatorios</div>


    <ul class="jugadoresSeleccion">

        <ul class="form-register" >
          <li><h4>JUGADOR 1</h4></li>
          <li> <img class="marco" id="panel1"  src="../../img/jugadores/0.jpg" height="250px"></li>
          <li><span class="seleccion" id="seleccion1">Seleccionar imagen</span>
          <div id="tvesModal" class="modalContainer">
                  <div class="modal-content">
                  <span class="close">x</span>
          <?php
              for($i=0;$i<=13;$i++)
              {
                echo "<img class=imagenes data-ruta=../../img/jugadores/$i.jpg width=220px height=220px src=../../img/jugadores/$i.jpg>";
              }
          ?>

          </div>
          </div>
        </li>


        <li><input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select" id="cartones">
        <option value="1" selected>1</option>
        <option value="2" >2</option>
        <option value="3">3</option>
        </select>
        </li>
        <li>  <div class="botons" id="aleatorio"  >Aleatorio</div></li>
        </ul>

     
        <ul class="form-register oculto" id="jugador1">
        <li><span class="cerrar" id="cerrar1">X</span></li> 
        <li><h4>JUGADOR 2</h4></li>
        <li> <img class="marco" id="panel2" src="../../img/jugadores/0.jpg" height="250px"></li>
        <li><span class="seleccion" id="seleccion2">Seleccionar imagen</span>
        <div id="tvesModal2" class="modalContainer2">
                <div class="modal-content2">
                <span class="close2">x</span>
        <?php
            for($i=0;$i<=13;$i++)
            {
              echo "<img class=imagenes2 data-ruta=../../img/jugadores/$i.jpg width=220px height=220px src=../../img/jugadores/$i.jpg>";
            }
        ?>

        </div>
        </div>
        </li>
        <li><input class="controls" type="text" name="nombres" id="nombres2" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select" id="cartones2">
        <option value="value1" selected>1</option>
        <option value="value2" >2</option>
        <option value="value3">3</option>
        </select>
        </li>
        <li>  <div class="botons" id="aleatorio2" >Aleatorio</div></li>
        </ul>

       
        <ul class="form-register oculto" id="jugador2">
        <li><span class="cerrar" id="cerrar2">X</span></li> 
        <li><h4>JUGADOR 3</h4></li>
        <li> <img class="marco" id="panel3" src="../../img/jugadores/0.jpg" height="250px"></li>
        <li><span class="seleccion" id="seleccion3">Seleccionar imagen</span>
        <div id="tvesModal3" class="modalContainer3">
                <div class="modal-content3">
                <span class="close3">x</span>
        <?php
            for($i=0;$i<=13;$i++)
            {
              echo "<img class=imagenes3 data-ruta=../../img/jugadores/$i.jpg width=220px height=220px src=../../img/jugadores/$i.jpg>";
            }
        ?>

        </div>
        </div>
        </li>
        <li><input class="controls" type="text" name="nombres" id="nombres3" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select" id="cartones3">
        <option value="value1" selected>1</option>
        <option value="value2" >2</option>
        <option value="value3">3</option>
        </select>
        </li>
        <li>  <div class="botons" id="aleatorio3"  >Aleatorio</div></li>
        </ul>


        <ul class="form-register oculto" id="jugador3">
        <li><span class="cerrar" id="cerrar3">X</span></li> 
        <li><h4>JUGADOR 4</h4></li>
        <li> <img class="marco" id="panel4"  src="../../img/jugadores/0.jpg" height="250px"></li>
        <li><span class="seleccion" id="seleccion4">Seleccionar imagen</span>
        <div id="tvesModal4" class="modalContainer4">
                <div class="modal-content4">
                <span class="close4">x</span>
        <?php
            for($i=0;$i<=13;$i++)
            {
              echo "<img class=imagenes4 data-ruta=../../img/jugadores/$i.jpg width=220px height=220px src=../../img/jugadores/$i.jpg>";
            }
        ?>

        </div>
        </div>
        </li>
        <li><input class="controls" type="text" name="nombres" id="nombres4" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select" id="cartones4">
        <option value="value1" selected>1</option>
        <option value="value2" >2</option>
        <option value="value3">3</option>
        </select>
        </li>
        <li>  <div class="botons" id="aleatorio4"  >Aleatorio</div></li>
        </ul>

        <ul>
        <li ><div  id="mas" class="mas">+</div></li>
        </ul>
    </ul>
  </form>
    </div>  
  </article>
</div>
<footer class="footer"><b>©Copyright Bingo!, todos los derechos reservados 2020-2021</b> <br> <b> Autores: <i>Andrés Cortés, Rafael Pérez, Ismael Aliaga y Alberto Ballesteros</i></b> </footer>
<script src="../../js/script.js"></script>
</body>
</html>