<?php
use App\Controller\{
    Listar,
    Formulario,
    Salvar
};

return [
    '/home' => Listar::class,
    '/reservar' => Formulario::class,
    '/salvar' => Salvar::class
];