<?php
    extract($_POST);
    use barber\query\citas;

    require('../../vendor/autoload.php');
    session_start();

    $fecha = $_SESSION['fecha'];
    $horario = $_SESSION['horario'];

    $servicios = new citas();
    $servicios-> SERVICIO($serv1, $serv2);
    header("location:../profile2.php");
?>