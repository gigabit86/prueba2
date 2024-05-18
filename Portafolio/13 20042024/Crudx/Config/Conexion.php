<?php

$host="localhost";
$user="root";
$pass="";
$db="relajoinsphp";

$conexion = new mysqli($host,$user,$pass,$db);

if($conexion)
{
   echo "";

}
  else
      {
              echo "conexion fallida";
           
      }
?>