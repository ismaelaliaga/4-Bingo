<?php

namespace Daw\Bingo;

?>

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
<header class="cabecera">
<form method="POST" enctype="multipart/form-data">
    <nav class="navegador">
      <ul>
      <li><img src="../../img/logot.png" class="cabecera_img"></li>
      </ul>
      <ul>
      <li class="tittle" id="aleatorios"><div class="botones">Todos Aleatorios</div></li>
      </ul>
      <ul>
        <li><h1 class="tittle">Selección de jugadores</h1></li>
      </ul>
      <ul>
      <li class="tittle" > <input class="botones tittle" name="Jugar" type="submit" value="Jugar"></li>
      </ul>
      <ul>
        <li>  <li class="tittle" > <a class="botones tittle" href="./partida.php?continuar=1">Continuar partida</a></li></li>
      </ul>
      <ul>
        <li><a  class="salir" href="./index.html">Salir</a></li>
      </ul>
    </nav>
  </header>
<div class="cuerpo">
  <article class="main">



    <ul class="jugadoresSeleccion">

        <ul class="form-register" >
          <li><h4>JUGADOR 1</h4></li>
          <li> <img class="marco" id="panel1"   src="../../img/jugadores/0.jpg" ></li>
          <input id="j1" name="j1" type="hidden" value="../../img/jugadores/0.jpg">
          <li><span class="seleccion" id="seleccion1">Seleccionar imagen</span>
          <div id="tvesModal" class="modalContainer">
                  <div class="modal-content">
                  <span class="close">x</span>
          <?php
              for($i=0;$i<=13;$i++)
              {
                echo "<img class=imagenes data-ruta=../../img/jugadores/$i.jpg  height=220px src=../../img/jugadores/$i.jpg>";
              }
          ?>

          </div>
          </div>
        </li>


        <li><input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" required></li>
        <li>Cartones
        <select name="select" id="cartones">
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
        <li> <img class="marco" id="panel2" name="j2" src="../../img/jugadores/0.jpg" ></li>
        <input id="j2" name="j2" type="hidden" value="../../img/jugadores/0.jpg">
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
        <li><input class="controls" type="text" name="nombres2" id="nombres2" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select2" id="cartones2">
        <option value="1" selected>1</option>
        <option value="2" >2</option>
        <option value="3">3</option>
        </select>
        </li>
        <li>  <div class="botons" id="aleatorio2" >Aleatorio</div></li>
        </ul>

       
        <ul class="form-register oculto" id="jugador2">
        <li><span class="cerrar" id="cerrar2">X</span></li> 
        <li><h4>JUGADOR 3</h4></li>
        <li> <img class="marco" id="panel3"  src="../../img/jugadores/0.jpg" ></li>
        <input id="j3" name="j3" type="hidden" value="../../img/jugadores/0.jpg">
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
        <li><input class="controls" type="text" name="nombres3" id="nombres3" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select3" id="cartones3">
        <option value="1" selected>1</option>
        <option value="2" >2</option>
        <option value="3">3</option>
        </select>
        </li>
        <li>  <div class="botons" id="aleatorio3"  >Aleatorio</div></li>
        </ul>


        <ul class="form-register oculto" id="jugador3">
        <li><span class="cerrar" id="cerrar3">X</span></li> 
        <li><h4>JUGADOR 4</h4></li>
        <li> <img class="marco" id="panel4" name="j4"  src="../../img/jugadores/0.jpg" ></li>
        <input id="j4" name="j4" type="hidden" value="../../img/jugadores/0.jpg">
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
        <li><input class="controls" type="text" name="nombres4" id="nombres4" placeholder="Ingrese su Nombre"></li>
        <li>Cartones<select name="select4" id="cartones4">
        <option value="1" selected>1</option>
        <option value="2" >2</option>
        <option value="3">3</option>
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
<footer class="footer"><b>©Copyright Bingo!, todos los derechos reservados 2020-2021</b></footer>
<script src="../../js/script.js"></script>
</body>
</html>

<?php
if(isset($_POST['Jugar']))
{
  if($_POST['nombres2']== null && $_POST['nombres3'] ==null && $_POST['nombres4']==null || $_POST['nombres2'] == null && $_POST['nombres3']==null || $_POST['nombres2'] == null && $_POST['nombres4'] == null || $_POST['nombres3']==null && $_POST['nombres4']==null)
  {

    $imagenJ1=$_POST['j1'];
    $nombreJ1=$_POST['nombres'];
    $cartonJ1=$_POST['select'];
 
   if($_POST['nombres2']!=null)
   {
      $imagenJ2=$_POST['j2'];
      $nombreJ2=$_POST['nombres2'];
      $cartonJ2=$_POST['select2'];
   }else
   {
     $nombreJ2=null;
     $cartonJ2=null;
     $imagenJ2=null;
   }
 
   if($_POST['nombres3']!=null)
   {
      $imagenJ3=$_POST['j3'];
      $nombreJ3=$_POST['nombres3'];
      $cartonJ3=$_POST['select3'];
   }else
   {
     $nombreJ3=null;
     $cartonJ3=null;
     $imagenJ3=null;
   }
 
   if($_POST['nombres4']!=null)
   {
      $imagenJ4=$_POST['j4'];
      $nombreJ4=$_POST['nombres4'];
      $cartonJ4=$_POST['select4'];
   }else
   {
     $nombreJ4=null;
     $cartonJ4=null;
     $imagenJ4=null;
   }
 require_once ('Bingo.php');
 require_once ('Jugador.php');
 require_once ('Carton.php');
 require_once ('funciones.php');
 
 $partidaComenzada = crearpartida($nombreJ1, $cartonJ1,$imagenJ1, $nombreJ2, $cartonJ2, $imagenJ2, $nombreJ3, $cartonJ3, $imagenJ3, $nombreJ4, $cartonJ4,$imagenJ4);
 header("location:./partida.php");//redireccionamos a partida.php

  }else
  {
  if($_POST['nombres']==$_POST['nombres2'] || $_POST['nombres3']==$_POST['nombres4'] ||$_POST['nombres']==$_POST['nombres3'] ||$_POST['nombres'] == $_POST['nombres4'] || $_POST['nombres2'] == $_POST['nombres3'] || $_POST['nombres3'] == $_POST['nombres4'])
  {
    echo ' no puede haber nombres iguales';

  }else
  {
  
   $imagenJ1=$_POST['j1'];
   $nombreJ1=$_POST['nombres'];
   $cartonJ1=$_POST['select'];

  if($_POST['nombres2']!=null)
  {
     $imagenJ2=$_POST['j2'];
     $nombreJ2=$_POST['nombres2'];
     $cartonJ2=$_POST['select2'];
  }else
  {
    $nombreJ2=null;
    $cartonJ2=null;
    $imagenJ2=null;
  }

  if($_POST['nombres3']!=null)
  {
     $imagenJ3=$_POST['j3'];
     $nombreJ3=$_POST['nombres3'];
     $cartonJ3=$_POST['select3'];
  }else
  {
    $nombreJ3=null;
    $cartonJ3=null;
    $imagenJ3=null;
  }

  if($_POST['nombres4']!=null)
  {
     $imagenJ4=$_POST['j4'];
     $nombreJ4=$_POST['nombres4'];
     $cartonJ4=$_POST['select4'];
  }else
  {
    $nombreJ4=null;
    $cartonJ4=null;
    $imagenJ4=null;
  }
require_once ('Bingo.php');
require_once ('Jugador.php');
require_once ('Carton.php');
require_once ('funciones.php');

$partidaComenzada = crearpartida($nombreJ1, $cartonJ1,$imagenJ1, $nombreJ2, $cartonJ2, $imagenJ2, $nombreJ3, $cartonJ3, $imagenJ3, $nombreJ4, $cartonJ4,$imagenJ4);

header("location:./partida.php");//redireccionamos a partida.php

    }  
  }
}



?>