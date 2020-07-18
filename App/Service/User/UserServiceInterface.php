<?php

namespace App\Service\User;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword);

    public function login(string $username, string $password) : UserDTO;

    public function getCurrentUser() : ?UserDTO;
}