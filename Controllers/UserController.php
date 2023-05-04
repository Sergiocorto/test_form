<?php


namespace Controllers;


use Dto\UserDto;
use Models\User;

class UserController
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function addUser($data)
    {
        $user = new UserDto($data['firstName'], $data['lastName'], $data['email'], $data['password']);
        $this->user->addUser($user);
    }
}