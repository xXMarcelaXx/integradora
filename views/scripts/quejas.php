<?php
use  barber\query\ejecuta;

include('../../vendor/autoload.php');
$insert= new ejecuta();
session_start();
extract($_POST);
$cadena= "INSERT INTO quejas VALUES ('','$message','".$_SESSION['usuario']."')";

 $insert->ejecutar($cadena);
  echo "<script> alert('Gracias');</script>";
   header ("refresh:3;  ../../views/profile2.php#contactanos");
   ?>