<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\UserController;

class Router {
    public $uriArray;

    function __construct() {
        $this->uriArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handleUserRoutes();
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    protected function handleMainRoutes() {
        if ($this->uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->homepage();
        }
    }

    protected function handleUserRoutes() {
        if ($this->uriArray[1] === 'contacts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->contactView();
        }

        if ($this->uriArray[1] === 'files' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->fileNameView();
        }

        if ($this->uriArray[1] === 'contacts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController = new UserController();
            $userController->saveUser();
        }

        if ($this->uriArray[1] === 'api' && $this->uriArray[2] === 'files' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->getAllfileNames();
        }
        

    }
}