<?php

namespace App\Repository\User;

use App\Data\UserDTO;

interface UserRepositoryInterface
{
    /**
     * @param UserDTO $userDTO
     */
    public function insert(UserDTO $userDTO);

    /**
     * @param int $id
     * @param UserDTO $userDTO
     */
    public function update(int $id, UserDTO $userDTO);

    /**
     * @param int $id
     */
    public function delete(int $id);

    /**
     * @param string $email
     * 
     * @return UserDTO|null
     */
    public function findOneByEmail(string $email) : ?UserDTO;

    /**
     * @param string $fullName
     * 
     * @return UserDTO|null
     */
    public function findOneByFullName(string $fullName): ?UserDTO;

    /**
     * @param int $id
     * 
     * @return UserDTO|null
     */
    public function findOneById(int $id) : ?UserDTO;
}