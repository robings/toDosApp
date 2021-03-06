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

    public function addTodo($taskName, $completedFlag, $urgentFlag)
    {
        $query= $this->dbConnection->prepare( "INSERT INTO `todos` (`taskName`, `completedFlag`, `urgentFlag`) VALUES (:taskName, :completedFlag, :urgentFlag);");
        $query->bindParam(':taskName', $taskName);
        $query->bindParam(':completedFlag', $completedFlag);
        $query->bindParam(':urgentFlag', $urgentFlag);
        return $query->execute();
    }

    public function deleteTodo($id)
    {
        $query= $this->dbConnection->prepare( "UPDATE `todos` SET `deletedFlag` = '1' WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function completeTodo($id)
    {
        $query= $this->dbConnection->prepare( "UPDATE `todos` SET `completedFlag` = '1' WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function editTodo($todo)
    {
        $id=$todo['id'];
        $taskName=$todo['taskName'];
        $completedFlag=$todo['completedFlag'];
        $urgentFlag=$todo['urgentFlag'];

        $query= $this->dbConnection->prepare( "UPDATE `todos` SET `taskName` = :taskName, `completedFlag` = :completedFlag, `urgentFlag` = :urgentFlag WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':taskName', $taskName);
        $query->bindParam(':completedFlag', $completedFlag);
        $query->bindParam(':urgentFlag', $urgentFlag);
        return $query->execute();
    }
}