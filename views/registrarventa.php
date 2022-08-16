<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.jpg">
  <link rel="stylesheet" href="../css/2perfil2.css">
  <link rel="stylesheet" href="../js/bootstrap.bundle.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<?php
extract($_POST);
?>
<body>
<section id="productos" class="productos">
      <div class="container">
        <div class="container">
          <h2>Tienda</h2>

          <div class="col-md-3">
            <!-- Button trigger modal -->
            <a href="../carrito/mostrarcarrito.php" type="button" class="btn btn-dark"><i class="bi bi-cart-fill">
              </i>(<?php echo (empty($_SESSION[$SID])) ? 0 : count($_SESSION[$SID]); ?>)</a>


            <br>
          </div>
        </div>

        <br>
        <div class="container">

          <div class="d-flex justify-content-center row">
            <?php
            use barber\query\select;
            include '../carrito/carrito.php';
            require("../vendor/autoload.php");

            $query3 = new select();
            $cadena3 = "SELECT * from productos";
            $producto = $query3->seleccionar($cadena3);

            foreach ($producto as $pro) {
              $producto_nom = $pro->nombre_producto;
              $descripcion = $pro->descripcion;
              $precio = $pro->costo;
              $img_producto = $pro->img_producto;
              $id = $pro->id_producto;
              $existencia = $pro->existencia;

            ?>

              <div class="container">
                <div class="row p-2 bg-white border rounded">
                  <div class="col-md-3 mt-1"><img data-toggle="popover" width="35%" class="img-fluid img-responsive rounded product-image" src="../<?php echo $pro->img_producto; ?>">
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
    </section>
</body>
</html>