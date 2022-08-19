<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Guarda pro</title>
</head>
<body>
    <div class="container">

    <?php
    use barber\query\Ejecuta;
    require("../../vendor/autoload.php");

    $insert =new ejecuta();
    extract($_POST);

    if($_FILES["image"]["error"] > 0)
    {

    }
    else{
        
        $ruta = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $cadena="INSERT INTO productos 
        (nombre_producto,cat_producto,descripcion,costo,precio_compra,img_producto,existencia) VALUES 
        ('$nombre_producto','$cat','$descripcion','$precio_venta','$precio_compra','$ruta','$existencia')";
        $insert->ejecutar($cadena);
    }

        echo "<div class='alert alert-success'> PRODUCTO REGISTRADO </div>";
        header("refresh:2; ../verPro.php");

    

    ?>

    </div>
    
</body>
</html>