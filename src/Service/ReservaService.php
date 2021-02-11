<?php
namespace App\Service;

use App\Entity\Carro;
use App\Entity\Reserva;
use App\Service\Interface\ServiceInterface;

class ReservaService implements ServiceInterface
{   
    private CarroService $carroService;

    public function __construct()
    {
        $this->carroService = new CarroService();
    }

    public function createEntity(array $data): Reserva
    {
        $reserva = new Reserva();

        if (isset($data['id_carro']) && isset($data['nome_carro'])) {
            $carro = $this->carroService->createEntity(
                ['id' => $data['id_carro'], 'nome' => $data['nome_carro']]
            );

            $reserva->setCarro($carro);
        } else {
            $reserva->setCarro($data['carro']);
        }

        if (isset($data['id'])) {
            $reserva->setId($data['id']);
        }

        $reserva->setDataInicio($data['data_inicio'])->setDataFim($data['data_fim'])->setNomeReservante($data['nome_reservante']);

        return $reserva;
    }
}