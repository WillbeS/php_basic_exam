<?php

namespace App\Data;

class BrandDTO
{
    const BRAND_MIN_LENGTH = 3;
    const BRAND_MAX_LENGTH = 50;


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $brand;

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of brand
     *
     * @return  string
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @param  string  $brand
     *
     * @return  self
     */ 
    public function setBrand(string $brand)
    {
        $this->brand = $brand;

        return $this;
    }
}