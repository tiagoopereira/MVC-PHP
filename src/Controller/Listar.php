<?php 
namespace App\Controller;

use App\Controller\HtmlRender;
use App\Controller\Interface\ControllerInterface;
use App\Repository\ReservaRepository;

class Listar extends HtmlRender implements ControllerInterface
{
    private ReservaRepository $reservaRepository;

    public function __construct()
    {
        $this->reservaRepository = new ReservaRepository();
    }

    public function processaRequisicao(): void
    {
        // VARIÁVEIS QUE ARMAZENAM O ANO E O MÊS QUE SERÁ CHECADO;
        $mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');
        $ano = isset($_GET['ano']) ? $_GET['ano'] : date('Y');
        $data = $ano . "-" . $mes;

        // VÁRIAVEL QUE ARMAZENA O DIA DA SEMANA DO PRIMEIRO DIA DO MÊS;
        $dia1 = date('w', strtotime($data));

        // VARIÁVEL QUE ARMAZENA A QUANTIDADE DE DIAS DO MÊS EM QUESTÃO;
        $dias = date('t', strtotime($data));

        // VARIÁVEL QUE ARMAZENA A QUANTIDADE DE LINHAS QUE HAVERÁ NO CALENDÁRIO;
        $linhas = ceil(($dia1 + $dias) / 7);

        // VARIÁVEIS QUE CHECARÃO QUAL É O PRIMEIRO DIA DO CALENDÁRIO;
        $dia1 = -$dia1;
        $data_inicio = date('Y-m-d', strtotime($dia1 . 'days', strtotime($data)));

        // VARIÁVEL QUE CHECA QUAL É O ÚLTIMO DIA DO CALENDÁRIO;
        $data_fim = date('Y-m-d', strtotime((($dia1 + ($linhas * 7)) - 1) . 'days', strtotime($data)));

        echo $this->renderizaHtml('reserva/listar.php', [
            'reservas' => $this->reservaRepository->findAll($data_inicio, $data_fim),
            'mes' => $mes,
            'ano' => $ano,
            'data_inicio' => $data_inicio,
            'data_fim' => $data_fim,
            'linhas' => $linhas
        ]);
    }
}