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

use barber\query\Ejecuta;

require("../../vendor/autoload.php");

$insert = new ejecuta();
extract($_POST);

$cadena = "UPDATE citas SET Status='Cancelada',motivo = '$motivo'
WHERE id_citas='$id'";

$insert->ejecutar($cadena);

echo"<h1 align='center'>CITA CANCELADA</h1>"
header("refresh:2; ../profile2.php");
?>
</body>
</html>