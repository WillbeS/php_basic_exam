<?php

namespace App\Data;

class CreateOfferDTO
{
    /**
     * @var \Generator|BrandDTO[]
     */
    private $brands;

    /**
     * @var OfferDTO
     */
    private $offer;

    /**
     * Get the value of brands
     *
     * @return  \Generator|BrandDTO[]
     */ 
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * Set the value of brands
     *
     * @param  \Generator|BrandDTO[]  $brands
     *
     * @return  self
     */ 
    public function setBrands($brands)
    {
        $this->brands = $brands;

        return $this;
    }

    /**
     * Get the value of offer
     *
     * @return  OfferDTO
     */ 
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set the value of offer
     *
     * @param  OfferDTO  $offer
     *
     * @return  self
     */ 
    public function setOffer(OfferDTO $offer)
    {
        $this->offer = $offer;

        return $this;
    }
}