<?php

namespace Todos\Controllers;

use Todos\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

class EditTodoController
{

    private $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data=$request->getParsedBody();
        if ($data['taskName']) {
            $taskName = $data['taskName'];
            $taskName = trim ($taskName);
            $taskName = htmlentities($taskName);
            $data['taskName']=$taskName;
        } else {
            $data['taskName']='Empty Task Name';
        }

        $success= $this->todoModel->editTodo($data);
        if ($success) {
            return $response->withJson("{'success':1}");
        } else {
            return $response->withJson("{'success':0}");
        }
    }
}