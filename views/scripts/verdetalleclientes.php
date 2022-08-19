<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        
        <div class="container">
                <h1>Detalles</h1>
                    <?php
                 
    
                   require("../../vendor/autoload.php");
                   session_start();
                   use barber\query\select;
                   extract($_GET);
                   $query=new select();
                $cadena="SELECT productos.nombre_producto,productos.costo,detalle_ovproductos.cantidad,
                sum(productos.costo*detalle_ovproductos.cantidad) as 'SUBTOTAL',
                sum((productos.costo*detalle_ovproductos.cantidad)*0.16) as 'IVA',
                sum((productos.costo*detalle_ovproductos.cantidad)*1.16) as 'TOTAL' from
                productos inner join detalle_ovproductos on detalle_ovproductos.producto=productos.id_producto inner join orden_ventas_producto
                on detalle_ovproductos.ov_productos=orden_ventas_producto.id_ovproducto where orden_ventas_producto.id_ovproducto='$id'
                group by detalle_ovproductos.producto";
                $tabla=$query->seleccionar($cadena);
    
                echo"<table style='text-align:center' class='table table-hover'>
                <thead class='table-secondary'>
                <tr>
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
                <a href="../profile2.php#historial"><button class="btn btn-danger" >Regeresar</button></a>
        

</body>
</html>

      
        
