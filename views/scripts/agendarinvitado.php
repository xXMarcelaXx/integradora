
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    extract($_POST);
    use barber\query\citas;

    require('../../vendor/autoload.php');
    session_start();

    $fecha = $_SESSION['fecha'];
    $_SESSION['horario'] = $horario;

    $cita = new citas();
    $cita-> CITA($fecha, $horario);
    echo "<div class='alert alert-success'> ACTUALIZADO </div>";
    header("refresh:3; ../registrarServicioInv.php")
    
?>
