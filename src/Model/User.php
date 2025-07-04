<?php

namespace LyraMaker\Entrevista\Model;

class User
{
    private ?string $user_code;
    private ?string $photo_path;
    private ?string $first_name;
    private ?string $second_name;
    private ?string $date_birth;
    private ?string $street;
    private ?string $neighborhood;
    private ?string $city;
    private ?string $state;
    private ?string $description;

    public function __construct($user_code = null, $first_name = null, $second_name = null, $date_birth = null, $street = null, $city = null, $neighborhood = null, $state = null, $description = null)
    {
        $this->setFirst_name($first_name)
            ->setSecond_name($second_name)
            ->setDate_birth($date_birth)
            ->setStreet($street)
            ->setCity($city)
            ->setNeighborhood($neighborhood)
            ->setState($state)
            ->setDescription($description);

        if (!is_null($user_code)) {
            $this->setUser_code($user_code);
        }
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    public function getDate_birth()
    {
        return $this->date_birth;
    }

    public function setDate_birth($date_birth)
    {
        $this->date_birth = $date_birth;
        return $this;
    }

    public function getSecond_name()
    {
        return $this->second_name;
    }

    public function setSecond_name($second_name)
    {
        $this->second_name = $second_name;
        return $this;
    }

    public function getFirst_name()
    {
        return $this->first_name;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getUser_code()
    {
        return $this->user_code;
    }

    public function setUser_code($user_code)
    {
        $this->user_code = $user_code;
        return $this;
    }

    public function getPhoto_path()
    {
        return $this->photo_path;
    }

    public function setPhoto_path($photo_path)
    {
        $this->photo_path = $photo_path;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }
}
