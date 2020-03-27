<?php

namespace Todos\Factories;

use Todos\Controllers\EditTodoController;
use Psr\Container\ContainerInterface;

class EditTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('todoModel');
        return new EditTodoController($todoModel);
    }
}