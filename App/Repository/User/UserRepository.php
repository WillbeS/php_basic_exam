<?php

namespace App\Repository\User;


use App\Data\UserDTO;
use App\Repository\RepositoryAbstract;

class UserRepository extends RepositoryAbstract implements UserRepositoryInterface
{
    public function insert(UserDTO $userDTO)
    {
        $this->db->query(
            "INSERT INTO users (email, password, full_name)
                  VALUES(?, ?, ?)
             "
        )->execute([
            $userDTO->getEmail(),
            $userDTO->getPassword(),
            $userDTO->getFullName()
        ]);
    }

    public function update(int $id, UserDTO $userDTO)
    {
        $this->db->query(
            "UPDATE users
             SET 
                email = ?,
                password = ?,
                full_name = ?
             WHERE id = ? 
            "
        )->execute([
            $userDTO->getEmail(),
            $userDTO->getPassword(),
            $userDTO->getFullName(),
            $id
        ]);
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM users WHERE id = ?")
            ->execute([$id]);
    }

    public function findOneByEmail(string $email): ?UserDTO
    {
        return $this->db->query(
            "SELECT 
                id, 
                email, 
                password, 
                full_name as fullName
            FROM 
                users
            WHERE 
                email = ?
             "
        )->execute([$email])
        ->fetch(UserDTO::class)
        ->current();
    }


    public function findOneByFullName(string $fullName): ?UserDTO
    {
        return $this->db->query(
            "SELECT 
                id, 
                email, 
                password, 
                full_name as fullName
            FROM 
                users
            WHERE 
                full_name = ?
             "
        )->execute([$fullName])
        ->fetch(UserDTO::class)
        ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query(
            "SELECT 
                id, 
                email, 
                password, 
                full_name as fullName
            FROM 
                users
            WHERE 
                id = ?
             "
        )->execute([$id])
        ->fetch(UserDTO::class)
        ->current();
    }
}
