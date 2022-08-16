<?php


session_start();
$SID=session_id();
$mensaje = "";
if (isset($_POST['accion'])) { //resibe el boton accion
    switch ($_POST['accion']) {
        case 'agregar':
           if ($_POST['cantidad'] >= 1 && $_POST['cantidad'] <= $_POST['existencia']) {

                $ID = $_POST['id'];
                $NOMBRE = $_POST['nombre'];
                $CANTIDAD = $_POST['cantidad'];
                $PRECIO = $_POST['precio'];

                if(!isset($_SESSION[$SID])){
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO,
                    );
                    $_SESSION[$SID][0] = $producto; 
                }

                $idproductos= array_column($_SESSION[$SID],'ID');

                if (in_array($ID, $idproductos)){
                        echo "<script> alert('Ya esta en el carrito');</script>";
                    }
                
                else{
                    $length= count($_SESSION[$SID]);
                     $producto=array (
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO,
                     );
                     $_SESSION[$SID][$length]=$producto;
                }
               
           
            }else if ($_POST['cantidad'] >= $_POST['existencia']) {
                echo "<script> alert('fuera de Stock');</script>";
            } else {
                echo "<script> alert('agregar cantidad correcta');</script>";
            }
            break;          
        case 'eliminar':
            $ID = $_POST['id'];
           
            foreach ($_SESSION[$SID] as  $productos=>$producto) 
            {
                if ($producto['ID'] == $ID) {
                   unset($_SESSION[$SID][$productos]);
                //$_SESSION['CARRITO'][$producto-1] = $producto; 
                //    $_SESSION['CARRITO'][$productos] = $array(0);
                //    $index += -1;
                
                }  
            }

            break;
    }
}
