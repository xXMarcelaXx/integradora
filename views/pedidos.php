<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo.jpg">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../js/bootstrap.bundle.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Classic Cuts</title>
</head>
<?php
require("../vendor/autoload.php");
use barber\query\select;
session_start();
if($_SESSION['tipo_cuenta'] == 'Administrador'){
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
          <li ><a href="../views/vistaadmin.php"><i class="bi bi-house-door-fill"></i><span>citas</span></a></li>
          <li><a href="../views/Usuario.php"><i class="bi bi-person-fill"></i><span>Usuarios</span></a></li>
          <li><a href="../views/Servicios.php"><i class="bi bi-bookmarks-fill"></i><span>Servicios</span></a></li>
          <li><a href="../views/verCat.php"><i class="bi bi-tags-fill"></i><span>Categoria</span></a></li>
          <li><a href="../views/Sugerencias.php"><i class="bi bi-chat-left-fill"></i><span>Sugerencias</span></a></li>
          <li><a href="../views/verPro.php"><i class="bi bi-bag-fill"></i></i><span>Productos</span></a></li>
          <li class="active"><a href="../views/pedidos.php"><i class="bi bi-list-ul"></i><span>Pedidos</span></a></li>
          <li><a href="../views/ventas.php"><i class="bi bi-currency-dollar"></i><span>ventas</span></a></li>
          <li><a href="../views/tiendaadmin.php"><i class="bi bi-card-checklist"></i><span>Registrar Venta</span></a></li>
          <li><a class="dropdown-item" href="scripts/cerrarsesion.php">Cerrar Session</a></li>
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
            <li><a class="dropdown-item" href="../views/tiendaadmin.php">Registrar venta</a></li>
            <li><a class="dropdown-item" href="scripts/cerrarsesion.php">Cerrar Session</a></li>
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

 
  <div class="container"><br>
    <div class="row">
      <div class="col-3 col-md-3">
        <a href="../reportes/otrospedidos.php" class="btn btn-outline-secondary">Otros pedidos</a>
      </div>
      <div class="col-3 col-md-3">
        <a href="../reportes/pedidoscancelados.php" class="btn btn-outline-secondary">Pedidos Cancelados</a>
      </div>

      <div class="col-4 col-md-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Buscar por folio
        </button>
      </div><br><br>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingresa el folio del pedido</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../reportes/pedixfolio.php" method="post">
                <div class="form-row ">
                  <div class="form-group">

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-list-check"></i></span>
                      <input type="number" class="form-control" name="folio" placeholder="Folio.." min="1" required>
                    </div>
                  </div><br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-secondary">Buscar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php

 $consulta= new select();
 echo "<h1>Pedidos pendientes para hoy</h1>";
 $fecha=date('Y-m-d');
 $cadena="SELECT cp.id_ovproducto as 'FOLIO', cp.nombre_usuario, concat(cp.nombre,' ',cp.ap_paterno,' ',cp.ap_materno) as 'Cliente',
 cp.subtotal as 'SUBTOTAL',cp.iva as 'IVA',cp.total as 'Monto_con_IVA',cp.Status from
 (select cuenta.nombre,cuenta.ap_paterno,cuenta.ap_materno,cuenta.nombre_usuario,
  SUM(productos.costo*detalle_ovproductos.cantidad) AS 'subtotal',
 SUM((productos.costo*detalle_ovproductos.cantidad)*1.16) AS 'total',
 SUM((productos.costo*detalle_ovproductos.cantidad)*0.16) AS 'iva',orden_ventas_producto.ovp_fecha,orden_ventas_producto.Status,
 orden_ventas_producto.id_ovproducto
 from cuenta inner join orden_ventas_producto on cuenta.nombre_usuario=orden_ventas_producto.Usuario_ovp 
 inner join detalle_ovproductos on detalle_ovproductos.ov_productos=orden_ventas_producto.id_ovproducto 
 inner join productos on productos.id_producto=detalle_ovproductos.producto group by orden_ventas_producto.id_ovproducto) as cp
 where cp.ovp_fecha ='$fecha' and cp.Status='Pendiente'";
 $tabla=$consulta->seleccionar($cadena);
echo $fecha;
 echo"<table style='text-align:center' class='table table-hover'>
 <thead class='table-secondary'>
 <tr>
 <th>FOLIO</th>
 <th>CLIENTE</th>
 <th>SUBTOTAL</th>
 <th>IVA</th>
 <th>MONTO CON IVA</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>
 </thead><tbody>";
 foreach($tabla as $registro)
 {
     echo "<tr>";
     echo "<td> $registro->FOLIO</td>";
     echo "<td> $registro->Cliente</td>";
     echo "<td>$ $registro->SUBTOTAL</td>";
     echo "<td>$ $registro->IVA</td>";
     echo "<td>$ $registro->Monto_con_IVA</td>";
     ?>
     <td><a href="scripts/finalizarpedido.php?id=<?php echo $registro->FOLIO?>" class="btn btn-secondary">Finalizar</a></td>
     <?php
          ?>
          <td><a href="scripts/cancelarpedido.php?id=<?php echo $registro->FOLIO?>" class="btn btn-danger">Cancelar</a></td>
          <?php
                    ?>
                    <td><a href="scripts/verdetalles.php?id=<?php echo $registro->FOLIO?>" class="btn btn-primary">Detalles</a></td>
                    <?php
     echo"</tr>";
 }

 echo "</tbody></table>";

?>

  </div>

  <?php
  }
  else
  {
    header("refresh:3;scripts/cerrarsesion.php");
  }
  ?>

  </main>
  <br>
</body>

</html>