<?php
namespace Routers;

use Controllers\PageController;
use Controllers\UserController;
use Interfaces\RouterInterface;
use Models\Logger;
use Models\User;
use Repositories\UserRepository;

class Router implements RouterInterface
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route($requestParts)
    {
        if($_SERVER['REQUEST_METHOD'] == "GET") PageController::getPage();
        if($_SERVER['REQUEST_METHOD'] == "POST") (new UserController(new User(new UserRepository(), new Logger())))->addUser($requestParts['body']);

    }
}