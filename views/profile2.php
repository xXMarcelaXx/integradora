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
  <title>Classic Cuts</title>
</head>
<?php
extract($_POST);

if (!isset($FI)) {
  $FI = '';
  $FF = '';
}

use barber\query\select;

include '../carrito/carrito.php';
require("../vendor/autoload.php");

$query = new select();

$cadena = "SELECT cuenta.nombre, concat(cuenta.nombre,' ',cuenta.ap_paterno,' ',cuenta.ap_materno)as completo,
         cuenta.direccion,cuenta.telefono,cuenta.correo FROM cuenta where cuenta.nombre_usuario='" . $_SESSION['usuario'] . "'";

$tabla = $query->seleccionar($cadena);

foreach ($tabla as $row) {
  $nombre = $row->nombre;
  $completo = $row->completo;
  $direccion = $row->direccion;
  $telefono = $row->telefono;
  $email = $row->correo;
}
?>

<body>
  <?php
  $fecha = date('d-m-Y');
  ?>
  <!--Seccion de Encabezado-->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="../img/homero.jfif" alt="" class="img-fluid rounded-circle mt-3">
        <h1 class="text-light"><a href="#"></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.facebook.com/profile.php?id=100063500375166" class="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/Classic.Cuts_Barberia/?fbclid=IwAR3gMkl_NnnES0o54LZS4fWnokOArjdW6ZnlnB3OPtGaO_Nc1Md9iKvevKE" class="Instagram">
            <i class="bi bi-instagram"></i></a>
        </div>
      </div>
      <!--Menu de Navegacion-->
      <nav class="nav-menu" id="men">
        <ul>
          <li class="active"><a href="#"><i class="bi bi-house-door-fill"></i><span>Home</span></a></li>
          <li><a href="#productos"><i class="bi bi-shop"></i><span>Tienda</span></a></li>
          <li><a href="#citas"><i class="bi bi-calendar-event-fill"></i><span>Citas</span></a></li>
          <li><a href="#historial"><i class="bi bi-clock-history"></i></i><span>Pedidos</span></a></li>
          <li><a href="#perfil"><i class="bi bi-person-fill"></i><span>Perfil</span></a></li>
          <li><a href="#contactanos"><i class="bi bi-envelope-fill"></i><span>Contactanos</span></a></li>
          <li><a href="scripts/cerrarsesion.php"><i class="bi bi-door-closed-fill"></i><span><button type="button" class="btn btn-outline-warning">Cerrar Sesion</button></span></a></li>


        </ul>
      </nav>
      <!--fine de menu de navegacion-->
      <div class="container mt-3 d-lg-none mobile-nav-toggle">

        <div class="dropdown dropend">
          <button type="button" class="btn  dropdown-toggle btn-outline-dark " data-bs-toggle="dropdown">
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Home</a></li>
            <li><a class="dropdown-item " href="#productos">Tienda</a></li>
            <li><a class="dropdown-item " href="#citas">Citas</a></li>
            <li><a class="dropdown-item " href="#perfil">Perfil</a></li>
            <li><a class="dropdown-item" href="#historial">Pedidos</a></li>
            <li><a class="dropdown-item" href="#contactanos">Contactanos</a></li>
            <li><a class="dropdown-item" href="scripts/cerrarsesion.php">Cerrar Sesion</a></li>

          </ul>
        </div>
      </div>

    </div>
  </header>
  <!--Fin de menu de navegacion-->
  <!--Hero Section-->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <div class="typing">
        <pre class="text-uppercase">Bienvenido</pre>
        <pre class="text-uppercase"><?php echo "$nombre"; ?></pre>
      </div>
    </div>
  </section>
  <!--Tienda-->
  <br>
  <main id="main">

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
    </section>
    <br>
    <hr>

    <!--Citas-->
    <div id="citas" class="container">
      <section>
        <h2>Citas</h2>
        <br>
        <?php $date = date('Y-m-d'); ?>
        <div class="row">
          <div class="col-md-3">
            <form action="profile2.php#citas" method="POST">
              <h5><label for="fecha">Ingresa fecha "Año-Dia-Mes"</label></h5>
              <input type="date" name="fecha" id="fecha" class="form-select" required min="<?php echo  $date ?>"><br>
              <Button type="submit" class="btn btn-outline-info btn-lg btn-block">Comprobar fecha</Button>
            </form>
          </div>
          <div class="col-md-3">
            <form action="scripts/agendarcita.php" method="POST">
              <?php

              $fecha = $date;

              $ccc = new select();
              $c = "SELECT citas.Usuario_C 'count' FROM citas INNER JOIN cuenta ON cuenta.nombre_usuario = citas.Usuario_C 
              inner join servicio_cita on servicio_cita.dt_cita = citas.id_citas
              INNER JOIN servicios ON servicios.id_servicio = servicio_cita.servicio_sc
              WHERE cuenta.nombre_usuario='" . $_SESSION['usuario'] . "' and citas.Status = 'Pendiente'";
              $cc = $ccc->seleccionar($c);
              extract($_POST);
              if ($cc == null || $cc < 1) {
                extract($_POST);
                if ($fecha >= $date) {

                  $_SESSION['fecha'] = $fecha;


                  $query = new select();
                  $cadena = "SELECT id_horario, horarios from horarios LEFT JOIN (SELECT id_horario IH ,hora_cita HC, fecha, horarios.horarios HH 
                            from citas inner join horarios on horarios.id_horario=citas.hora_cita where fecha='" . $_SESSION['fecha'] . "' and citas.status='Pendiente')
                            as HF on horarios.id_horario = HF.IH  where HF.HH is null;";

                  $reg = $query->seleccionar($cadena);
                }
                echo "<br>";
              } else {
              ?>
                <div class="col-md-12">
                  <?php
                  echo "<fieldset style='background-color:LightSalmon;'><p>Ya tienes una cita pendiente, Cancelala para agendar otra</p></fieldset>";
                  ?></div>
              <?php
              }
              echo
              "<div class='md-3'>
                                <label class='control-label'>
                                  <h5>Horarios</h5>
                                </label>
                                <select name='horario' class='form-select' required>
                                <option value=''>Selecciona un horario</option>";


              foreach ($reg as $value) {
                if (!isset($value->hora_cita)) {
                  echo "<option value=" . $value->id_horario . "'>" . $value->horarios . "</option>";
                }
              }

              echo
              "   </select>
                            </div><br>";
              ?>

              <?php
              if ($_POST == null or $fecha < $date) {
                echo
                "<div class='col-md-12'>
                                <button type='submit' class ='btn btn-outline-danger btn-lg btn-block' disabled>Agendar Cita</button>
                            </div>";
              } else {
                echo
                "<div class='col-md-12'>
                                <button type='submit' class ='btn btn-outline-danger btn-lg btn-block'>Agendar Cita</button>
                            </div>";
              }
              ?>
            </form>


          </div>
      </section>

    </div>
    </div>
    <hr>
    <div id="citapen" class="container ">
      <section>
        <h1>Cita pendientes</h1>
        <div class="row">
          <div class="col-md-12 ">
            <?php
            $cit = new select();
            $lol = "SELECT * FROM citas JOIN horarios ON horarios.id_horario=citas.hora_cita JOIN servicio_cita on citas.id_citas=servicio_cita.dt_cita JOIN cuenta ON cuenta.nombre_usuario = citas.Usuario_C JOIN servicios ON servicios.id_servicio=servicio_cita.servicio_sc WHERE citas.Status='Pendiente' AND cuenta.nombre_usuario='" . $_SESSION['usuario'] . "'";
            $resu = $cit->seleccionar($lol);
            ?>
            <table class="table">
              <thead class="table table-dark">
                <th>Fecha de la cita</th>
                <th>Horario</th>
                <th>Servicio</th>
                <th>Editar</th>
              </thead>
              <tbody>
                <?php
                foreach ($resu as $uwu) {
                  $_SESSION['id_cita'] = $uwu->id_citas;
                  $_SESSION['id_servicio'] = $uwu->id_servicio;
                  $_SESSION['id_ovcita'] = $uwu->id_ovcita;
                  echo "<tr>";
                  echo "<td>$uwu->nombre_usuario</td>";
                  echo "<td>$uwu->horarios</td>";
                  echo "<td>$uwu->nombre_servicio</td>";
                  echo "<td><a href='../views/scripts/editardetallecitacliente.php' class='btn btn-secondary'>Editar</a></td>";
                  echo "</tr>";
                }
                if (isset($uwu)) {
                  echo "<td colspan='3' align='center'><button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#cita'>Cancelar cita</button></td>";
                }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </section>
    </div>
    <br>
    <hr>
    <div class="container" id="historial">
      <section>
        <h2>Informacion de Ordenes</h2>
        <br>
        <form action="profile2.php#historial" method="POST">
          <div class="row">
            <div class="col-md-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Incial</span>
                <input type="date" class="form-control" placeholder="Fecha Incial" aria-label="Username" aria-describedby="basic-addon1" name="FI">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Final</span>
                <input type="date" class="form-control" placeholder="Fecha Final" aria-label="Username" aria-describedby="basic-addon1" name="FF">

              </div>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-outline-secondary">Ver</button>
            </div>
          </div>
        </form>

        <?php
if($_POST)
{
  $us=$_SESSION['usuario'];
    extract($_POST);

            $con= new select();
            $cadena="SELECT cp.id_ovproducto as 'FOLIO', cp.nombre_usuario, concat(cp.nombre,' ',cp.ap_paterno,' ',cp.ap_materno) as 'Cliente',
            cp.subtotal as 'SUBTOTAL',cp.iva as 'IVA',cp.total as 'Monto_con_IVA',cp.Status,cp.ovp_fecha from
            (select cuenta.nombre,cuenta.ap_paterno,cuenta.ap_materno,cuenta.nombre_usuario,
             SUM(productos.costo*detalle_ovproductos.cantidad) AS 'subtotal',
            SUM((productos.costo*detalle_ovproductos.cantidad)*1.16) AS 'total',
            SUM((productos.costo*detalle_ovproductos.cantidad)*0.16) AS 'iva',orden_ventas_producto.ovp_fecha,orden_ventas_producto.Status,
            orden_ventas_producto.id_ovproducto
            from cuenta inner join orden_ventas_producto on cuenta.nombre_usuario=orden_ventas_producto.Usuario_ovp 
            inner join detalle_ovproductos on detalle_ovproductos.ov_productos=orden_ventas_producto.id_ovproducto 
            inner join productos on productos.id_producto=detalle_ovproductos.producto group by orden_ventas_producto.id_ovproducto) as cp
            where cp.Status='Pendiente' and cp.ovp_fecha between '$FI' and '$FF' and cp.nombre_usuario='$us'";

            $tabla=$con->seleccionar($cadena);
           
            echo"<table style='text-align:center' class='table table-hover'>
            <thead class='table-secondary'>
            <tr>
            <th>FOLIO</th>
            <th>FECHA</th>
            <th>CLIENTE</th>
            <th>SUBTOTAL</th>
            <th>IVA</th>
            <th>MONTO CON IVA</th>
            <th></th>
            <th></th>
            </tr>
            </thead><tbody>";
           
            foreach($tabla as $registro)
            {
                echo "<tr>";
                echo "<td> $registro->FOLIO</td>";
                echo "<td> $registro->ovp_fecha</td>";
                echo "<td> $registro->Cliente</td>";
                echo "<td>$ $registro->SUBTOTAL</td>";
                echo "<td>$ $registro->IVA</td>";
                echo "<td>$ $registro->Monto_con_IVA</td>";
            

                ?>
                <td><a href="scripts/verdetalleclientes.php?id=<?php echo $registro->FOLIO?>" class="btn btn-info">Detalles</a></td>
                <td><a href="scripts/cancelarpedidocliente.php?id=<?php echo $registro->FOLIO?>" class="btn btn-danger">Cancelar</a></td>

                <?php
                echo"</tr>";
            }
           
            echo "</tbody></table>";
        
    
}

?>
           <h2>Historial de Pedidos</h2>
   <form action="profile2.php#historial" method="POST">
          <div class="row">
            <div class="col-md-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Incial</span>
                <input type="date" class="form-control" placeholder="Fecha Incial" aria-label="Username" aria-describedby="basic-addon1" name="finicial">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Final</span>
                <input type="date" class="form-control" placeholder="Fecha Final" aria-label="Username" aria-describedby="basic-addon1" name="ffinal">

              </div>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-outline-secondary" id="finalizados">Ver</button>
            </div>
          </div>
        </form>
        <?php
if($_POST['finalizados'])
{
    extract($_POST);

            $con= new select();
            $cadena="SELECT cp.id_ovproducto as 'FOLIO', cp.nombre_usuario, concat(cp.nombre,' ',cp.ap_paterno,' ',cp.ap_materno) as 'Cliente',
            cp.subtotal as 'SUBTOTAL',cp.iva as 'IVA',cp.total as 'Monto_con_IVA',cp.Status,cp.ovp_fecha from
            (select cuenta.nombre,cuenta.ap_paterno,cuenta.ap_materno,cuenta.nombre_usuario,
             SUM(productos.costo*detalle_ovproductos.cantidad) AS 'subtotal',
            SUM((productos.costo*detalle_ovproductos.cantidad)*1.16) AS 'total',
            SUM((productos.costo*detalle_ovproductos.cantidad)*0.16) AS 'iva',orden_ventas_producto.ovp_fecha,orden_ventas_producto.Status,
            orden_ventas_producto.id_ovproducto
            from cuenta inner join orden_ventas_producto on cuenta.nombre_usuario=orden_ventas_producto.Usuario_ovp 
            inner join detalle_ovproductos on detalle_ovproductos.ov_productos=orden_ventas_producto.id_ovproducto 
            inner join productos on productos.id_producto=detalle_ovproductos.producto group by orden_ventas_producto.id_ovproducto) as cp
            where cp.Status='Finalizada' and cp.ovp_fecha between '$finicial' and '$ffinal' and cp.nombre_usuario='$us'";

            $tabl10=$con->seleccionar($cadena);
           
            echo"<table style='text-align:center' class='table table-hover'>
            <thead class='table-secondary'>
            <tr>
            <th>FOLIO</th>
            <th>FECHA</th>
            <th>CLIENTE</th>
            <th>SUBTOTAL</th>
            <th>IVA</th>
            <th>MONTO CON IVA</th>
            <th></th>
            <th></th>
            </tr>
            </thead><tbody>";
           
            foreach($tabla10 as $registro)
            {
                echo "<tr>";
                echo "<td> $registro->FOLIO</td>";
                echo "<td> $registro->ovp_fecha</td>";
                echo "<td> $registro->Cliente</td>";
                echo "<td>$ $registro->SUBTOTAL</td>";
                echo "<td>$ $registro->IVA</td>";
                echo "<td>$ $registro->Monto_con_IVA</td>";
            

                ?>
                <td><a href="scripts/verdetalleclientes.php?id=<?php echo $registro->FOLIO?>" class="btn btn-info">Detalles</a></td>

                <?php
                echo"</tr>";
            }
           
            echo "</tbody></table>";
        
    
}

?>

      </section>
    </div>
    <hr>
    <!--Perfil-->
    <br>
    <div id="perfil" class="container ">

      <section>
        <h2>Perfil</h2>
        <div class="container">
          <?php

          $query = new select();
          $cadena = "SELECT * FROM cuenta WHERE cuenta.nombre_usuario = '" . $_SESSION['usuario'] . "'";
          $tabla = $query->seleccionar($cadena);
          foreach ($tabla as $reg) {
          }
          ?>

        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="container">
              <div class="card" style="width: 30rem;">
                <div class="card-body">
                  <h5 class="card-title">Informacion</h5>
                  <form action="#" method="POST">
                    <div class="row">
                      <!--Nombre de usuario-->
                      <!--ssss-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Username" name="nombre_usuario" value="<?php echo $reg->nombre_usuario ?>
                                        ">
                        </div>
                      </div>
                      <!--contraseña-->
                      <!--Nombre-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Ingresa tu nombre" name="nombre" value="<?php echo $reg->nombre ?>
                                        ">
                        </div>
                      </div>
                      <!--app-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Apellido Paterno" name="ap_paterno" value="<?php echo $reg->ap_paterno ?>
                                        ">
                        </div>
                      </div>
                      <!--apm-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Apellido Materno" name="ap_materno" value="<?php echo $reg->ap_materno ?>
                                        ">
                        </div>
                      </div>
                      <!--direccion-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></i></span>
                          <input type="text" class="form-control" disabled placeholder="Direccion/Calle" name="direccion" value="<?php echo $reg->direccion ?>
                                        ">
                        </div>
                      </div>
                      <!--Telefono-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Numero de telefono" name="telefono" value="<?php echo $reg->telefono ?>
                                        ">
                        </div>
                      </div>
                      <!--correo-->
                      <div class="col-md-12">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                          <input type="email" class="form-control" disabled placeholder="Correo Electronico" name="correo" value="<?php echo $reg->correo ?>
                                        ">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <a href="../views/editarbarbero.php?id=<?php echo $reg->nombre_usuario ?>" class="btn btn-outline-secondary">Modificar Datos</a>
                      </div>
                  </form>
                  <!--sueldo-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <br>
    </div>

    <br>
    <!--Contacto-->
    <hr>
    <br>
    <div id="contactanos" class="container ">
      <section>
        <h2>Quejas y Sugerencias</h2>

        <div class="mt-5 conatiner">
          <div class="text-center ">
            <h3 class="text-dark">¿Como podemos ayudarte?</h3>
          </div>
          <div class=" d-flex align-items-center justify-content-center">
            <div class="bg-white col-md-4">
              <div class="p-4 rounded shadow-md">
                <div class="mt-3 mb-3">
                  <form action="scripts/quejas.php" method="POST">
                    <label for="message" class="form-label">Quejas o Sugerencias</label>
                    <textarea name="message" cols="20" rows="6" class="form-control" placeholder="Escribe"></textarea>
                    <br>
                    <button class="btn btn-dark" type="submit"> Enviar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
    </div>

  </main>
  <br>
</body>

<!--Modal-->
<div class="modal" tabindex="-1" id="cita">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cita"></button>
      </div>
      <div class="modal-body">
        <form action="scripts/citacanceladaus.php" method="POST">
          <input type="number" name="id" value="<?php echo "$uwu->id_citas" ?>" hidden>
          <label for="">Ingresa la razon de cancelacion</label>
          <textarea name="motivo" id="" cols="100" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


</html>