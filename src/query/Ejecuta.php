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
            $cc = new Database("barberia","admin","1234");
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