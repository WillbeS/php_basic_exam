<?php

namespace App\Data;

class ProfileDTO
{
    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @var OfferDTO[]
     */
    private $offers;

    /**
     * @var int
     */
    private $count;

    /**
     * @var int
     */
    private $totalProfit;

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

    /**
     * Get the value of count
     *
     * @return  int
     */ 
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the value of count
     *
     * @param  int  $count
     *
     * @return  self
     */ 
    public function setCount(int $count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get the value of totalProfit
     *
     * @return  int
     */ 
    public function getTotalProfit()
    {
        return $this->totalProfit;
    }

    /**
     * Set the value of totalProfit
     *
     * @param  int  $totalProfit
     *
     * @return  self
     */ 
    public function setTotalProfit(int $totalProfit)
    {
        $this->totalProfit = $totalProfit;

        return $this;
    }

    /**
     * Get the value of offers
     *
     * @return  OfferDTO[]
     */ 
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * Set the value of offers
     *
     * @param  OfferDTO[]  $offers
     *
     * @return  self
     */ 
    public function setOffers($offers)
    {
        $this->offers = $offers;

        return $this;
    }
}