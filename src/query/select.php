<?php
namespace barber\query;
use PDO;
use PDOException;
use barber\data\Database;

class select
{
    public function seleccionar($qry)
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
            echo $e->getMessage();
        }
        
    }


}


?>
    


