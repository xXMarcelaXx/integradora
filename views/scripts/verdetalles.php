<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../img/logo.jpg">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../js/bootstrap.bundle.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Classic Cuts</title>
</head>
<?php

require("../../vendor/autoload.php");
session_start();
use barber\query\select;
if ($_SESSION['tipo_cuenta'] == 'Administrador') {
?>

<body>
    <!--Seccion de Encabezado-->
    <header id="header">
        <div class="d-flex flex-column">
            <div class="profile">
                 <img src="https://i.pinimg.com/originals/3f/30/44/3f30447d3466e1e7fe7a9c4e99550097.jpg" alt="" class="img-fluid rounded-circle mt-3">
                <h1 class="text-light"><a href="#"></a></h1>
                <div class="social-links mt-3 text-center">
                    <a href="https://www.facebook.com/profile.php?id=100063500375166" class="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/Classic.Cuts_Barberia/?fbclid=IwAR3gMkl_NnnES0o54LZS4fWnokOArjdW6ZnlnB3OPtGaO_Nc1Md9iKvevKE" class="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <!--Menu de Navegacion-->
            <nav class="nav-menu" id="men">
                <ul>
                    <li><a href="../vistaadmin.php"><i class="bi bi-house-door-fill"></i><span>citas</span></a></li>
                    <li><a href="../Usuario.php"><i class="bi bi-person-fill"></i><span>Usuarios</span></a></li>
                    <li><a href="../Servicios.php"><i class="bi bi-bookmarks-fill"></i><span>Servicios</span></a></li>
                    <li><a href="../verCat.php"><i class="bi bi-tags-fill"></i><span>Categoria</span></a></li>
                    <li><a href="../Sugerencias.php"><i class="bi bi-chat-left-fill"></i><span>Sugerencias</span></a></li>
                    <li><a href="../verPro.php"><i class="bi bi-bag-fill"></i></i><span>Productos</span></a></li>
                    <li><a href="../pedidos.php"><i class="bi bi-list-ul"></i><span>Pedidos</span></a></li>
                    <li><a href="../ventas.php"><i class="bi bi-currency-dollar"></i><span>ventas</span></a></li>
                    <li><a href="../registrar.php"><i class="bi bi-card-checklist"></i><span>Registrar Venta</span></a></li>
                    <li><a class="dropdown-item" href="cerrarsesion.php">Cerrar Session</a></li>
                </ul>
            </nav>
            <!--fine de menu de navegacion-->
            <div class="container mt-2 d-lg-none mobile-nav-toggle">

                <div class="dropdown dropend">
                    <button type="button" class="btn  dropdown-toggle btn-outline-dark " data-bs-toggle="dropdown">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../views/vistaadmin.php">citas</a></li>
                        <li><a class="dropdown-item " href="../views/Usuario.php">Usuarios</a></li><a class="dropdown-item " href="../views/Sugerencias.php">Sugerencias</a></li>
                        <li><a class="dropdown-item " href="../views/Servicios.php">Servicios</a></li>
                        <li><a class="dropdown-item " href="../views/verCat.php">Categoria</a></li>
                        <li><a class="dropdown-item" href="../views/verPro.php">Productos</a></li>
                        <li><a class="dropdown-item" href="../views/pedidos.php">Pedidos</a></li>
                        <li><a class="dropdown-item" href="../views/ventas.php">Ventas</a></li>
                        <li><a class="dropdown-item" href="../views/registrar.php">Registrar venta</a></li>
                        <li><a class="dropdown-item" href="../views/scripts/cerrarsesion.php">Cerrar Session</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </header>
    <!--Fin de menu de navegacion-->
    <!--Hero Section-->
    <!--Tienda-->
    <br>
    <main id="main">

    <div class="container">
        <h1>Detalles</h1>
    <?php

    $query=new select();
    extract($_GET);

$cadena="  SELECT orden_ventas_producto.id_ovproducto, productos.nombre_producto,productos.costo,detalle_ovproductos.cantidad, 
sum(productos.costo*detalle_ovproductos.cantidad) as 'SUBTOTAL',
sum((productos.costo*detalle_ovproductos.cantidad)*0.16) as 'IVA', 
sum((productos.costo*detalle_ovproductos.cantidad)*1.16) as 'TOTAL' from
productos inner join detalle_ovproductos on productos.id_producto=detalle_ovproductos.producto inner join orden_ventas_producto
on detalle_ovproductos.ov_productos=orden_ventas_producto.id_ovproducto where orden_ventas_producto.id_ovproducto='$id'
group by orden_ventas_producto.id_ovproducto";
$tabla=$query->seleccionar($cadena);

echo"<table style='text-align:center' class='table table-hover'>
 <thead class='table-secondary'>
 <tr>
 <th>FOLIO</th>
 <th>PRODUCTO</th>
 <th>PRECIO UNITARIO</th>
 <th>CANTIDAD</th>
 <th>SUBTOTAL</th>
 <th>IVA</th>
 <th>TOTAL</th>
 <th></th>
 </tr>
 </thead><tbody>";
 foreach($tabla as $registro)
 {
     echo "<tr>";
     echo "<td> $registro->id_ovproducto</td>";
     echo "<td> $registro->nombre_producto</td>";
     echo "<td>$ $registro->costo</td>";
     echo "<td> $registro->cantidad</td>";
     echo "<td>$ $registro->SUBTOTAL</td>";
     echo "<td>$ $registro->IVA</td>";
     echo "<td>$ $registro->TOTAL</td>";
     echo"</tr>";
 }

 echo "</tbody></table>";
    ?>

    </main>
    <br>
    <?php
} else {
  echo "<h1>No se meta donde no le llaman perro</h1>";
  header("refresh:3;../views/scripts/cerrarsesion.php");
}
  ?>
</body>

</html>