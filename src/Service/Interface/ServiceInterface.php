<?php
namespace App\Service\Interface;

interface ServiceInterface 
{
    public function createEntity(array $data): object;
}