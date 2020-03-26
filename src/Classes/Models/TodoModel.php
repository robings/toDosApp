<?php

namespace Todos\Models;

class TodoModel
{
    private $dbConnection;

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection=$dbConnection;
    }

    public function getAllTodos()
    {
        $query= $this->dbConnection->prepare( "SELECT `id`, `taskName`, `completedFlag`, `deletedFlag`, `urgentFlag` FROM `todos`;");
        $query->execute();
        return $query->fetchAll();
    }
}