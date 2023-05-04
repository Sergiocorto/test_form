<?php


namespace Models;


use Interfaces\LoggerInterface;
use Interfaces\UserInterface;
use Repositories\UserRepository;
use Dto\UserDto;

class User implements UserInterface
{
    private UserRepository $repository;
    private LoggerInterface $logger;

    public function __construct(UserRepository $repository, LoggerInterface $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger;
    }


    public function addUser(UserDto $user)
    {
        $this->repository->getUser($user);

        if($this->isValid($user) && !$this->isUserInArray($user))
        {
            $this->repository->setUser($user);
            http_response_code(400);
        }else
        {
            http_response_code(200);
        }
    }

    public function isValid(UserDto $user): bool
    {
        if (!preg_match("/^[a-zA-Zа-яА-Я]+$/u", $user->firstName) || !preg_match("/^[a-zA-Zа-яА-Я]+$/u", $user->lastName))
        {
            return false;
        }

        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }

        if (strlen($user->password) <= 0)
        {
            return false;
        }
        print_r(strlen($user->password));
        return true;
    }

    private function isUserInArray(UserDto $user): bool
    {
        if ($this->repository->getUser($user))
        {
            $this->logger->writeLog('User find in array');
            return true;
        }
        $this->logger->writeLog('User not find in array');
        return false;
    }
}