<?php

namespace Interfaces;

use Dto\UserDto;

interface RepositoryInterface
{

    public function getUser(UserDto $user);

    public function setUser(UserDto $user);
}