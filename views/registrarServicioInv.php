<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<form method="POST" action="../views/scripts/agendarserviciosinv.php">
    <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <?php

                                use barber\query\select;
                                require('../vendor/autoload.php');
                            
                                $query1 = new select();
                                $cadena1 = "SELECT * from servicios";
                                $reg1 = $query1->seleccionar($cadena1);

                                echo 
                                "<div class='mb-3'>
                                    <label class='control-label'>
                                        Servicio 1:
                                    </label>
                                    <select name='serv1' class='form-select'>";
                                foreach ($reg1 as $value1) {
                                    if (!isset($value-> id_servicio)) {
                                        echo "<option value=" . $value1->id_servicio . "'>" . $value1->nombre_servicio . "</option>";
                                    }
                                }
                                echo 
                                "   </select>
                                </div>";
                            ?>
                            </div>
                            <div class="col-md-3">
                                <?php
                                    $query2 = new select();
                                    $cadena2 = "SELECT * from servicios";
                                    $reg2 = $query2->seleccionar($cadena2);
                                    echo 
                                    "<div class='mb-3'>
                                        <label class='control-label'>
                                            Servicio 2:
                                        </label>
                                        <select name='serv2' class='form-select'>
                                        <option value='Ninguno'>Ninguno</option>";
                                        
                                    foreach ($reg2 as $value2) {
                                        if (!isset($value->id_servicio)) 
                                        {
                                            echo "<option value=" . $value2->id_servicio . "'>" . $value2->nombre_servicio . "</option>";
                                        }
                                    }
                                    echo 
                                    "   </select>
                                    </div>";
                                ?>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-secondary">Subir Servicios</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <form action="scripts/eliminarcita.php">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-secondary">Cancelar Cita</button>
                            </div>
                    </form>
                </div>
            </div>
</body>
</html>