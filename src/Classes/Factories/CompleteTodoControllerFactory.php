<?php

namespace Todos\Factories;

use Todos\Controllers\CompleteTodoController;
use Psr\Container\ContainerInterface;

class CompleteTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('todoModel');
        return new CompleteTodoController($todoModel);
    }
}