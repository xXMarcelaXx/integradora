<?php
use  barber\query\Ejecuta;

include('../../vendor/autoload.php');
$insert= new ejecuta();
session_start();
extract($_POST);
$cadena= "INSERT INTO quejas (motivo,fk_usuario) VALUES ('$message','".$_SESSION['usuario']."')";
   
 $insert->ejecutar($cadena);
  echo "<script> alert('Gracias');</script>";
   header ("refresh:3;  ../profile2.php#contactanos");
   ?>
