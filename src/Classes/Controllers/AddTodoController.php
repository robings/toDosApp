<?php

namespace Todos\Controllers;

use Todos\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddTodoController
{

    private $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        //get the post data and pass to call the model method to post to db
        //return a redirect to /
    }
}