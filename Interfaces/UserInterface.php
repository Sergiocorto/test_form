<?php


namespace Interfaces;


use Dto\UserDto;

interface UserInterface
{
    public function addUser(UserDto $user);
    public function isValid(UserDto $user);
}