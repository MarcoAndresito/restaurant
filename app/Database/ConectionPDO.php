<?php

namespace App\Database;

use PDO;
use PDOException;

class ConectionPDO
{
    public static function CreateConection()
    {
        try {
            $dsn = "pgsql:dbname=restaurant;host=localhost;port=5432";
            $username = "postgres";
            $password = "12345678";
            $conection = new PDO($dsn, $username, $password);
            return $conection;
        } catch (PDOException $e) {
            echo "Error al crear la conecion : " . $e->getMessage();
            exit;
        }
    }
}
