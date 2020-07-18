<?php

namespace App\Repository\Brand;

use App\Data\BrandDTO;
use App\Repository\RepositoryAbstract;

class BrandRepository extends RepositoryAbstract implements BrandRepositoryInterface
{
    /**
     * @param int $id
     * 
     * @return BrandDTO|null
     */
    public function findOneById(int $id): ?BrandDTO
    {
        return $this->db->query(
            "SELECT 
                id,
                brand
            FROM 
                brands
            WHERE
                id = ?
            "
        )->execute([$id])
            ->fetch(BrandDTO::class)
            ->current();
    }

    /**
     * @return \Generator|BrandDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query(
            "SELECT 
                id,
                brand
            FROM 
                brands
            "
        )->execute()
            ->fetch(BrandDTO::class);
    }
}