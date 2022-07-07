<?php

namespace App\Repositories;

use App\Database\ConectionPDO;
use App\Models\Comida;

class ComidaRepository
{
    public static function GetAll()
    {
        $conection = ConectionPDO::CreateConection();
        $sentencia = $conection->prepare("select * from Comidas");
        $sentencia->execute();
        $rows = $sentencia->fetchAll();
        $comidas = array();
        foreach ($rows as $row) {
            $comida = new Comida();
            $comida->setComida($row);
            array_push($comidas, $comida);
        }
        return $comidas;
    }

    public static function Find($id)
    {
        $conection = ConectionPDO::CreateConection();
        $sentencia = $conection->prepare("select * from Comidas where id = ?");
        $sentencia->execute([$id]);
        $row = $sentencia->fetch();
        if (empty($row)) {
            return null;
        }
        $comida = new Comida();
        $comida->setComida($row);
        return $comida;
    }

    public static function Delete($id)
    {
        $conection = ConectionPDO::CreateConection();
        $sentencia = $conection->prepare("delete from Comidas where id = ?");
        $sentencia->execute([$id]);
    }
}
