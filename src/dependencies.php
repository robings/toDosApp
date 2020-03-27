<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // db connection
    $container['dbConnection']= function ($c) {
        $settings = $c->get('settings')['dbConnection'];
        $dbConnection = new \PDO($settings['mysqlHost'] . $settings['dbName'], $settings['username'], $settings['password']);
        $dbConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $dbConnection;
    };

    $container['SeeAllTodosController'] = new Todos\Factories\SeeAllTodosControllerFactory();
    $container['todoModel'] = new Todos\Factories\TodoModelFactory();
    $container['AddTodoController'] = new Todos\Factories\AddTodoControllerFactory();
    $container['DeleteTodoController'] = new Todos\Factories\DeleteTodoControllerFactory();
    $container['CompleteTodoController'] = new Todos\Factories\CompleteTodoControllerFactory();

};
