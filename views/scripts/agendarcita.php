<?php
    extract($_POST);
    use barber\query\citas;

    require("../../vendor/autoload.php");

    $fecha = $_SESSION['fecha'];
    $_SESSION['horario'] = $horario;

    $cita = new citas();
    $cita-> CITA_US($fecha, $horario);

    header("location:../registrarServicios.php");
?>