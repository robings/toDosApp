<?php

namespace Todos\Controllers;

use Slim\Views\PhpRenderer;

class SeeAllTodosController
{
    private $renderer;
    private $todoModel;

    public function __construct(PhpRenderer $renderer, $todoModel)
    {
        $this->renderer=$renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke($request, $response, $args)
    {
        $args['todos'] = $this->todoModel->getAllTodos();
        return $this->renderer->render($response, 'todos.phtml', $args);
    }
}