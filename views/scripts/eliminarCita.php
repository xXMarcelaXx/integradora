<?php
session_start();
use barber\query\citas;
require("../../vendor/autoload.php");
$cancelar = new citas();
$cancelar -> CANCELAR();
header("location:../cita.php")
?>