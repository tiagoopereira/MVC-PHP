<?php
namespace App\Repository;

use App\Repository\BaseRepository as ParentRepository;
use App\Entity\Reserva;
use App\Service\ReservaService;
use Exception;

class ReservaRepository extends ParentRepository
{
    private ReservaService $reservaService;

    public function __construct()
    {
        parent::__construct();
        $this->reservaService = new ReservaService();
    }

    /** @return Reserva[] */
    public function findAll(string $data_inicio = null, string $data_fim = null): array
    {
        $reservas = [];

        $sql = "SELECT r.id, r.data_inicio, r.data_fim, r.nome_reservante, c.id as id_carro, c.nome as nome_carro FROM reservas r LEFT JOIN carros c ON r.id_carro = c.id WHERE (NOT(data_inicio > :data_fim OR data_fim < :data_inicio));";

        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->execute();

        if (($sql->rowCount()) > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $reserva = $this->reservaService->createEntity($item);
                $reservas[] = $reserva;
            }
        }

        return $reservas;
    }

    public function reservar(Reserva $reserva) {
        if (!$this->verificarDisponibilidade($reserva)) {
            throw new Exception('Veículo já reservado na data solicitada!');
        }

        $sql = "INSERT INTO reservas SET id_carro = :id_carro, data_inicio = :data_inicio, data_fim = :data_fim, nome_reservante = :nome_reservante";
        $sql = $this->pdo-> prepare($sql);
        $sql->bindValue(":id_carro", $reserva->getCarro()->getId());
        $sql->bindValue(":data_inicio", $reserva->getDataInicio());
        $sql->bindValue(":data_fim", $reserva->getDataFim());
        $sql->bindValue(":nome_reservante", $reserva->getNomeReservante());
        $sql->execute();
    }

    private function verificarDisponibilidade(Reserva $reserva) {
        $sql = "SELECT * FROM reservas WHERE id_carro = :id_carro AND (NOT(data_inicio > :data_fim OR data_fim < :data_inicio))";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_carro", $reserva->getCarro()->getId());
        $sql->bindValue(":data_inicio", $reserva->getDataInicio());
        $sql->bindValue(":data_fim", $reserva->getDataFim());
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
}