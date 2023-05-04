<?php


namespace Interfaces;


use Dto\UserDto;

interface LoggerInterface
{
    public function writeLog(string $userString);
}