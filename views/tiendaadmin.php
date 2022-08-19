<?php
use barber\query\select;
require ('../carrito/carritoadmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="container">
          <h2>Tienda</h2></a>

          <div class="col-md-3">
            <!-- Button trigger modal -->
            <a href="../carrito/mostraradmincar.php" type="button" class="btn btn-dark"><i class="bi bi-cart-fill">
              </i>(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</a>


            <br>
          </div>
        </div>

        <br>
        <div class="container">

          <div class="d-flex justify-content-center row">
            <?php


            require("../vendor/autoload.php");

            $query3 = new select();
            $cadena3 = "SELECT * from productos";
            $producto = $query3->seleccionar($cadena3);

            foreach ($producto as $pro) {
              $producto_nom = $pro->nombre_producto;
              $descripcion = $pro->descripcion;
              $precio = $pro->costo;
              $id = $pro->id_producto;
              $existencia = $pro->existencia;

            ?>

              <div class="container">
                <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img data-toggle="popover" width="35%" class="img-fluid img-responsive rounded product-image" src="data:image/jpeg;base64,<?php echo base64_encode($producto[0]=$pro->img_producto)?>">
                  </div>
                  <div class="col-md-6 mt-1">
                    <h5><?php echo $producto_nom; ?></h5>
                    <div class="d-flex flex-row ratings mt-2 text-warning">
                      <p class="text-justify"><?php echo $descripcion; ?><br><br></p>

                    </div>
                  </div>
                  <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                      <h4 class="mr-1">$<?php echo $precio; ?></h4>
                    </div>
                    <h6 class="text-success">Recoger en tienda!</h6>
                    <div class="d-flex flex-column mt-4">
                      <form action="" method="POST">
                        <input type="hidden" name="existencia" id="existencia" value=" <?php echo $existencia; ?>">
                        <input type="hidden" name="id" id="id" value=" <?php echo $id; ?>">
                        <input type="hidden" name="nombre" id="nombre" value=" <?php echo $producto_nom; ?>">
                        <input type="hidden" name="precio" id="precio" value=" <?php echo $precio; ?>">
                        <input type="number" name="cantidad" id="cantidad" value="" min="0" max='<?php echo $existencia; ?>'><br>
                        <button class="btn btn-outline-primary btn-sm mt-1" name="accion" value="agregar" type="submit"> Añadir </button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            <?php }
            echo $_SESSION['usuario'];
            ?>




          </div>
    
</body>
</html>l