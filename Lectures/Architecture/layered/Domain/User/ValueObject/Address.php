<?php

declare(strict_types=1);

class Address
{
    private string $street;
    private string $city;

    public function __construct(string $street, string $city)
    {

        $this->street = $street;
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
}
