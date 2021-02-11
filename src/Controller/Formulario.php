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
        echo $this->renderizaHtml('reserva/formulario.php', [
            'carros' => $this->carroRepository->findAll()
        ]);
    }
}