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
    <div class="container">
        <?php
        $date = date('Y-m-d');

        use barber\query\Ejecuta;
       

        require("../../vendor/autoload.php");
        $insert = new ejecuta();

        extract($_POST);
        if ($nombre_usuario) {
           $insert->verificareg("$nombre_usuario","$correo");
              $hash=password_hash($contraseña,PASSWORD_DEFAULT);
              $tiempo = date('Y-m-d');
              $cadena="INSERT INTO cuenta VALUES('$nombre_usuario','$hash','$nombre','$ap_paterno','$ap_materno','$direccion','$telefono','$correo','','Usuario','$tiempo')";
              $insert->ejecutar($cadena);  
        ?>

        <?php
        }
        header("refresh:3 ../vistaadmin.php");
        ?>

    </div>
</body>

</html>
