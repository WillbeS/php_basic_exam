<?php

namespace App\Service\Offer;

use App\Data\OfferDTO;
use App\Data\ProfileDTO;

interface OfferServiceInterface
{
    /**
     * @param OfferDTO $offerDTO
     */
    public function add(OfferDTO $offerDTO);

    /**
     * @param OfferDTO $offerDTO
     */
    public function edit(OfferDTO $offerDTO);

    /**
     * @param int $id
     */
    public function delete(int $id);


    /**
     * @var ProfileDTO
     */
    public function getAllByUser(int $id): ProfileDTO;
}