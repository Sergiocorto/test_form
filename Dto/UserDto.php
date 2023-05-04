<?php

namespace Dto;

class UserDto
{
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;

    public function __construct($firstName, $lastName, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }
}