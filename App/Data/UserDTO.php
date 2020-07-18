<?php

namespace App\Data;


class UserDTO
{
    const EMAIL_MIN_LENGTH = 4;
    const EMAIL_MAX_LENGTH = 255;

    const FULL_NAME_MIN_LENGTH = 4;
    const FULL_NAME_MAX_LENGTH = 255;
    

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $fullName;


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
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        DTOValidator::validate(
            self::EMAIL_MIN_LENGTH, 
            self::EMAIL_MAX_LENGTH, 
            $email, 
            'text', 
            'The given email'
        );

        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return  string
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  string  $password
     *
     * @return  self
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of fullName
     *
     * @return  string
     */ 
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set the value of fullName
     *
     * @param  string  $fullName
     *
     * @return  self
     */ 
    public function setFullName(string $fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }
}