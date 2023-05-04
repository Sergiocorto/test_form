<?php

$routes = [
    'users' =>
        [
            'controller' => 'Controllers\UserController',
            'model' => 'Models\User',
            'repository' => 'Repositories\UserRepository',
            'route' =>
                [
                    'add' => [
                        'requestMethod' => 'POST',
                        'method' => 'addUser'
                    ]
                ]
        ],
    '' =>
        [
            'controller' => 'Controllers\PageController',
            'route' =>
                [
                    '/' => [
                        'requestMethod' => 'GET',
                        'method' => 'getPage'
                    ]
                ]
        ],
];