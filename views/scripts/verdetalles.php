<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Ver detalles</title>
</head>
<body>
    <div class="container">
        <h1>Detalles</h1>
    <?php
    use barber\query\select;
    require("../../vendor/autoload.php");

    $query=new select();

    extract($_GET);
$cadena=" SELECT orden_ventas_producto.id_ovproducto, productos.nombre_producto,productos.costo,detalle_ovproductos.cantidad, sum(detalle_ovproductos.producto*cantidad) as 'SUBTOTAL'
,sum((detalle_ovproductos.producto*cantidad)*0.16) as 'IVA', sum((detalle_ovproductos.producto*cantidad)*1.16) as 'TOTAL' from
productos inner join detalle_ovproductos on productos.id_producto=detalle_ovproductos.producto inner join orden_ventas_producto
on detalle_ovproductos.ov_productos=orden_ventas_producto.id_ovproducto where orden_ventas_producto.id_ovproducto='$id'
 group by detalle_ovproductos.producto";
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

    </div>
    
</body>
</html>