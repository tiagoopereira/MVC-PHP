<?php
namespace App\Repository;

use App\Repository\BaseRepository as ParentRepository;
use App\Entity\Carro;
use App\Service\CarroService;

class CarroRepository extends ParentRepository 
{   
    private CarroService $carroService;

    public function __construct()
    {
        parent::__construct();
        $this->carroService = new CarroService();
    }

    /** @return Carro[] */
    public function findAll(): array
    {
        $carros = [];

        $sql = "SELECT * FROM carros";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $carro = $this->carroService->createEntity($item);
                $carros[] = $carro;
            }
        }

        return $carros;
    }

    public function find(int $id): Carro 
    {
        $sql = "SELECT * FROM carros WHERE id = :id";
        $sql = $this -> pdo -> prepare($sql);
        $sql -> bindValue(":id", $id);
        $sql -> execute();

        if ($sql->rowCount() > 0) {
            $data = $sql -> fetch();
            $carro = $this->carroService->createEntity($data);
        }

        return $carro;
    }
}