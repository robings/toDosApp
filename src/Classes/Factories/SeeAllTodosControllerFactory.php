<?php

namespace Todos\Factories;

use Todos\Controllers\SeeAllTodosController;
use Psr\Container\ContainerInterface;

class SeeAllTodosControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('todoModel');
        return new SeeAllTodosController($renderer, $todoModel);
    }
}