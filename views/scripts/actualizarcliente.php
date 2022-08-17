<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../js/bootstrap.js">
    <link rel="stylesheet" href="../../js/bootstrap.bundle.js">
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <?php
    extract($_POST);

    use barber\Query\ejecuta;

    require("../../vendor/autoload.php");
    $insert = new ejecuta();
        $cadena = "UPDATE cuenta SET nombre='$nombre',ap_paterno='$ap_paterno',ap_materno='$ap_materno',direccion='$direccion',telefono='$telefono'
        WHERE nombre_usuario='$nombre_usuario'";
                $insert->ejecutar($cadena);
        echo "<div class='alert alert-danger'><h3> ¡Datos modificados Exitosamente! </h3></div>";
        header("refresh:3; ../profile2.php");
    
    ?>
</body>

</html>