<?php
namespace App\Repository;

use PDO;

class BaseRepository
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=mysql;dbname=sistema_reservas", "root", "root");
    }
}