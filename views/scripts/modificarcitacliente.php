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

    <?php
    extract($_POST);

    use barber\query\citas;

    require('../../vendor/autoload.php');
    session_start();
    extract($_POST);

    $_SESSION['horario'] = $horario;

    $cita = new CITAS();
    $cita->CITACLIENTE($servicio, $horario);

    header("refresh:3; ../profile2.php");
    echo "<h1>Cita Modificada</h1>";
    ?>
</body>

</html>