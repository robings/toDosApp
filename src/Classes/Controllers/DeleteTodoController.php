<?php

namespace Todos\Controllers;

use Todos\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

class DeleteTodoController
{

    private $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data=$request->getParsedBody();
        $success= $this->todoModel->deleteTodo($data['id']);
        if ($success) {
            return $response->withJson("{'success':1}");
        } else {
            return $response->withJson("{'success':0}");
        }
    }
}