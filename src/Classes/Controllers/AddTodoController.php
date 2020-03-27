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
       $result= $request->getParsedBody();
       if ($result['taskName']) {
           $taskName = $result['taskName'];
           $taskName = trim ($taskName);
           $taskName = htmlentities($taskName);
       }

        if ($result['completedFlag']) {
            $completedFlag = 1;
        } else {
            $completedFlag = 0;
        }

        if ($result['urgentFlag']) {
            $urgentFlag = 1;
        } else {
            $urgentFlag = 0;
        }

        $success= $this->todoModel->addTodo($taskName, $completedFlag, $urgentFlag);
        if ($success) {
            return $response->withRedirect('/');
        } else {
            echo "Opps. Something went wrong";
            echo "<a href=\"/\">Back to Todos Page</a>";
        }

    }
}