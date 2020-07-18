<?php

namespace App\Repository\Brand;

use App\Data\BrandDTO;

interface BrandRepositoryInterface
{
    /**
     * @param int $id
     * 
     * @return BrandDTO|null
     */
    public function findOneById(int $id): ?BrandDTO;

    /**
     * @return \Generator|BrandDTO[]
     */
    public function findAll(): \Generator;
}