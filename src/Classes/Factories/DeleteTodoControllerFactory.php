<?php

namespace Todos\Factories;

use Todos\Controllers\DeleteTodoController;
use Psr\Container\ContainerInterface;

class DeleteTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('todoModel');
        return new DeleteTodoController($todoModel);
    }
}
