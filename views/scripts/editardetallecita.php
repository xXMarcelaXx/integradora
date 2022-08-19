<!DOCTYPE html>
<html lang="en">
<?php

use barber\query\select;

require("../../vendor/autoload.php");
session_start();
echo "<div hidden>";
$idc = $_SESSION['idc'];
$idser=$_SESSION['idser'];
$id_ovcita= $_SESSION['id_ovcita'];
echo "</div>";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Modifcar Servicios Cita</h1>

        <form action="../scripts/modificarcitaadmin.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Servicio</span>
                            <select name="servicio" class="form-select">";
                                <?php
                                $query = new select();
                                $cadena = "SELECT * FROM servicios";
                                $reg = $query->seleccionar($cadena);
                                foreach ($reg as $value) {
                                    echo "<option value='" . $value->id_servicio . "'>" . $value->nombre_servicio . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!--Horarios-->
                    <?php
                    $date = date('Y-m-d');
                    $fecha = $date;
                    require('../../vendor/autoload.php');

                    extract($_POST);
                    if ($fecha >= $date) {
                        $_SESSION['fecha'] = $fecha;

                        $quer = new select();
                        $caden = "SELECT id_horario, horarios from horarios LEFT JOIN (SELECT id_horario IH ,hora_cita HC, fecha, horarios.horarios HH from citas inner join horarios on horarios.id_horario=citas.hora_cita where fecha='" . $_SESSION['fecha'] . "' and citas.status='Pendiente')
                        as HF on horarios.id_horario = HF.IH  where HF.HH is null;";
                        $registro = $quer->seleccionar($caden);
                    }
                    ?>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Servicio</span>
                            <select name="horario" class="form-select">";
                                <?php
                                "<div class='md-3'>
              <label class='control-label'>
                  horario
              </label>
              <select name='horario' class='form-select' required>
              <option value=''>Selecciona un horario</option>";

                                foreach ($registro as $value) {
                                    if (!isset($value->hora_cita)) {
                                        echo "<option value=" . $value->id_horario . "'>" . $value->horarios . "</option>";
                                    }
                                }

                                echo
                                "   </select>
          </div>";
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                    </div>
                    
                </div>
            </div>
        </form>


        <?php
        ?>
    </div>
</body>

</html>