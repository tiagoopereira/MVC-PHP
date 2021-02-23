<?php 
namespace App\Controller;

use App\Controller\HtmlRender;
use App\Controller\Interface\ControllerInterface;
use App\Repository\CarroRepository;

class Formulario extends HtmlRender implements ControllerInterface
{
    private CarroRepository $carroRepository;

    public function __construct()
    {
        $this->carroRepository = new CarroRepository();
    }

    public function processaRequisicao(): void
    {   
        $dados = [];

        if (isset($_GET['error']) && $_GET['error'] === 'reservado') {
            $erro = 'Veículo já reservado na data solicitada!';
            $dados['erro'] = $erro;
        }

        $dados['carros'] = $this->carroRepository->findAll();

        echo $this->renderizaHtml('reserva/formulario.php', $dados);
    }
}