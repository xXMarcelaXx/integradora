<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<?php

use barber\query\ejecuta;

require("../../vendor/autoload.php");

$insert = new Ejecuta();
extract($_POST);

$cadena = "DELETE FROM servicio_cita
WHERE servicio_cita.id_ovcita='$id'";
echo "<h1>Servicio Eliminado</h1>";
$insert->ejecutar($cadena);


header("refresh:2; ../vistaadmin.php");
?>
</body>
</html>