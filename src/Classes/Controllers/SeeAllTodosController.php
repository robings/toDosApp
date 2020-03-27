<?php

namespace Todos\Controllers;

use Slim\Views\PhpRenderer;
use Slim\Http\Request;
use Slim\Http\Response;
use Todos\Models\TodoModel;

class SeeAllTodosController
{
    private $renderer;
    private $todoModel;

    public function __construct(PhpRenderer $renderer, TodoModel $todoModel)
    {
        $this->renderer=$renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['todos'] = $this->todoModel->getAllTodos();
        return $this->renderer->render($response, 'todos.phtml', $args);
    }
}