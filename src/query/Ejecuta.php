<?php
namespace barber\query;
use PDO;
use PDOException;
use barber\data\Database;

class ejecuta
{
    public function ejecutar($qry)
    {
        try 
        {
            $cc = new Database("barberia","bar","admin");
            $objetoPDO= $cc->getPDO();
            $resultado= $objetoPDO->query($qry);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);            
            $cc->desconectarDB();
            return $fila;
            
            
        }
        catch(PDOException $e)
        {
        
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
                header("refresh:2 ../../views/Usuario.php");
            }
            else
            {
                echo"<div class='alert alert-success'>";
                echo"<h1 align='center'><font color='green'>usuario registrado</font></h1>";
                echo"</div>";
            header("location:../../views/vistaadmin.php");
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
