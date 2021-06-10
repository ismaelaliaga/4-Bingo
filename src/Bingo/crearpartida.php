<?php
namespace Daw\Bingo;

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
    }  
  }
}
header("location: partida.php/");//redireccionamos a partida.php
?>