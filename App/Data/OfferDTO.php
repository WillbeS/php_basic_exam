<?php

namespace App\Data;

class OfferDTO
{
    const NAME_MIN_LENGTH = 3;
    const EMAIL_MAX_LENGTH = 255;

    const IMAGE_MIN_LENGTH = 3;
    const IMAGE_MAX_LENGTH = 255;

    const DESCRIPTION_MIN_LENGTH = 10;
    const DESCRIPTION_MAX_LENGTH = 10000;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $imageUrl;

    /**
     * @var string
     */
    private $description;

    /**
     * @var BrandDTO
     */
    private $brand;

    /**
     * @var UserDTO
     */
    private $user;

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
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return  float
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param  float  $price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of imageUrl
     *
     * @return  string
     */ 
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set the value of imageUrl
     *
     * @param  string  $imageUrl
     *
     * @return  self
     */ 
    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of brand
     *
     * @return  BrandDTO
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @param  BrandDTO  $brand
     *
     * @return  self
     */ 
    public function setBrand(BrandDTO $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of user
     *
     * @return  UserDTO
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param  UserDTO  $user
     *
     * @return  self
     */ 
    public function setUser(UserDTO $user)
    {
        $this->user = $user;

        return $this;
    }
}