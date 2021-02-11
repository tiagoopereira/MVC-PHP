<?php
namespace App\Controller;

use App\Controller\HtmlRender;
use App\Controller\Interface\ControllerInterface;
use App\Repository\CarroRepository;
use App\Repository\ReservaRepository;
use App\Service\ReservaService;

class Salvar extends HtmlRender implements ControllerInterface
{
    private ReservaService $reservaService;
    private ReservaRepository $reservaRepository;
    private CarroRepository $carroRepository;

    public function __construct()
    {
        $this->reservaService = new ReservaService();
        $this->reservaRepository = new ReservaRepository();
        $this->carroRepository = new CarroRepository();
    }

    public function processaRequisicao(): void
    {
        $carro_id = filter_input(
            INPUT_POST,
            'carro',
            FILTER_SANITIZE_STRING
        );

        $data_inicio = filter_input(
            INPUT_POST,
            'data_inicio',
            FILTER_SANITIZE_STRING
        );

        $data_fim = filter_input(
            INPUT_POST,
            'data_fim',
            FILTER_SANITIZE_STRING
        );

        $nome_reservante = filter_input(
            INPUT_POST,
            'nome_reservante',
            FILTER_SANITIZE_STRING
        );

        $carro = $this->carroRepository->find($carro_id);

        $data = [
            'carro' => $carro,
            'data_inicio' => $data_inicio,
            'data_fim' => $data_fim,
            'nome_reservante' => $nome_reservante
        ];

        $reserva = $this->reservaService->createEntity($data);

        try {
            $this->reservaRepository->reservar($reserva);
            header('Location: /home');
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}