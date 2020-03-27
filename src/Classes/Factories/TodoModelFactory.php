<?php

namespace Todos\Factories;

use Todos\Models\TodoModel;
use Psr\Container\ContainerInterface;

class TodoModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $dbConnection = $container->get('dbConnection');
        return new todoModel($dbConnection);
    }
}