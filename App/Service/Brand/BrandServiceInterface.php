<?php

namespace App\Service\Brand;

use App\Data\BrandDTO;
use Exception\NotFoundException;

interface BrandServiceInterface
{
    /**
     * @param int $id
     * 
     * @return BrandDTO
     * 
     * @throws NotFoundException
     */
    public function getOneById(int $id): BrandDTO;

    /**
     * @return \Generator|BrandDTO[]
     */
    public function getAll(): \Generator;
}