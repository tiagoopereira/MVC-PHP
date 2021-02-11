<?php
namespace App\Entity;

use App\Entity\Carro;

class Reserva
{
    private ?int $id;
    private Carro $carro;
    private string $data_inicio;
    private string $data_fim;
    private string $nome_reservante;

    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getCarro(): Carro
    {
        return $this->carro;
    }

    public function setCarro(Carro $carro): self
    {
        $this->carro = $carro;

        return $this;
    }

    public function getDataInicio(): string
    {
        return $this->data_inicio;
    }

    public function setDataInicio(string $data_inicio): self
    {
        $this->data_inicio = $data_inicio;

        return $this;
    }

    public function getDataFim(): string
    {
        return $this->data_fim;
    }

    public function setDataFim(string $data_fim): self
    {
        $this->data_fim = $data_fim;

        return $this;
    }

    public function getNomeReservante(): string
    {
        return $this->nome_reservante;
    }

    public function setNomeReservante(string $nome_reservante): self
    {
        $this->nome_reservante = $nome_reservante;

        return $this;
    }
}