<?php
namespace barber\query;

use barber\data\Database;
use PDO;
use PDOException;

class ejecutal
{
    public function ejecutar($qry)
    {
        try
        {
            $cc= new Database("barberia","bar","admin");
             $objetopdo=$cc->getPDO();
             $resultado=$objetopdo->query($qry);
             $cc->desconectarDb();
        }
        catch(PDOException $e)
        {
            echo"<p>nombre de usuario o correo en uso</p>";
        }
    }

    public function verificareg($nombre_usuario,$correo)
    {
        try
        {
            $pase=0;
            $cc= new Database("barberia","bar","admin");
            $objetopdo=$cc->getPDO();

            $query="SELECT* FROM cuenta WHERE nombre_usuario='$nombre_usuario' or correo='$correo'";
            $consulta=$objetopdo->query($query);
            while($renglon=$consulta->fetch(PDO::FETCH_ASSOC))
            {
                if ($nombre_usuario=$renglon['nombre_usuario'] or $correo=$renglon['correo']) {
                    $pase=1;
                }
                else {
                    $pase=0;
                }
            }

            if ($pase>0) 
            {
                
                echo"<div class='alert alert-danger'>";
               echo"<h2 align='center'><font color='red'>Usuario o correo ya existentes</font></h2>";
                echo"</div>";
                header("refresh:2 ../../views/registro.php");
            }
            else
            {
                echo"<div class='alert alert-success'>";
                echo"<h1 align='center'><font color='green'>usuario registrado</font></h1>";
                echo"</div>";
            header("location:../../views/iniciosesion.php");
            }      
            $cc->desconectarDb();
        }
        catch(PDOException $e)
        {
            echo"<p>nombre de usuario en uso</p>";
        }

    } 
    
}
?>
