<?php

namespace App\Repository\Offer;

use App\Data\OfferDTO;

interface OfferRepositoryInterface
{
    /**
     * @param OfferDTO $offerDTO
     */
    public function insert(OfferDTO $offerDTO);

    /**
     * @param OfferDTO $offerDTO
     */
    public function update(OfferDTO $offerDTO);

    /**
     * @param int $id
     */
    public function delete(int $id);

    /**
     * @var \Generator
     */
    public function findAllByUserId(int $id): \Generator;
}