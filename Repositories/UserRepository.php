<?php

namespace Repositories;

use Dto\UserDto;
use \Interfaces\RepositoryInterface;


class UserRepository implements RepositoryInterface
{
    private $users;

    public function __construct()
    {
        $this->users = include 'users.php';
    }

    public function getUser(UserDto $searchUser)
    {
        foreach ($this->users as $user) {
            if (
                $user['firstName'] == $searchUser->firstName &&
                $user['lastName'] == $searchUser->lastName &&
                $user['email'] == $searchUser->email &&
                $user['password'] == $searchUser->password
            ) {
                return $user;
            }
        }
        return false;
    }
    public function setUser(UserDto $user)
    {

        $newUser = [
            'id' => count($this->users)+1,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => $user->email,
            'password' => $user->password,
        ];

        array_push($this->users, $newUser);

        file_put_contents('users.php', '<?php return ' . var_export($this->users, true) . ';');

    }
}