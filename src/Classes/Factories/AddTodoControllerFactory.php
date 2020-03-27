<?php

namespace Todos\Factories;

use Todos\Controllers\AddTodoController;
use Psr\Container\ContainerInterface;

class AddTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('todoModel');
        return new AddTodoController($todoModel);
    }
}
