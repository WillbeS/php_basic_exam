<?php

namespace App\Service\Brand;

use App\Data\BrandDTO;
use App\Repository\Brand\BrandRepositoryInterface;
use Exception\NotFoundException;

class BrandService implements BrandServiceInterface
{
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }


    public function getOneById(int $id): BrandDTO
    {
        $brand = $this->brandRepository->findOneById($id);

        if(!$brand) {
            throw new NotFoundException('Item is not found');
        }

        return $brand;
    }


    public function getAll(): \Generator
    {
        return $this->brandRepository->findAll();
    }
}