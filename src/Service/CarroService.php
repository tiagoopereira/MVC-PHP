<?php
namespace App\Service;

use App\Entity\Carro;
use App\Service\Interface\ServiceInterface;

class CarroService implements ServiceInterface
{
    public function createEntity(array $data): Carro
    {
        $carro = new Carro();
        $carro->setId($data['id'])->setNome($data['nome']);

        return $carro;
    }
}