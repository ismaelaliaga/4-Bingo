<?php

$servidor= "localhost";
$user= "root";
$password= NULL;
$database= "bingo";

$db = new mysqli($servidor,$user, $password,$database);

if($db->connect_error){ 
    die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
}