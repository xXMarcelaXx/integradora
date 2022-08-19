<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
    <?php
    use barber\query\Ejecuta;
    require("../../vendor/autoload.php");
    $ex = $_POST['existencia'];
    $insert =new ejecuta();
    extract($_POST);


    if($_FILES["image"]["error"] > 0)
    {

    }
    else{
        
        $ruta = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $cadena="UPDATE productos SET nombre_producto='$nombre_producto',cat_producto='$cat',descripcion='$descripcion',
        costo=$precio_venta,precio_compra=$precio_compra,img_producto='$ruta',existencia=$ex WHERE id_producto='$id_producto'";
        $insert->ejecutar($cadena);
    }

    echo "<div class='alert alert-success'> ACTUALIZADO </div>";
        header("refresh:4; ../verPro.php");
    ?>

    </div>
    
</body>
</html>