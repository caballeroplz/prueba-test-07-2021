<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressCity
{

    private string $city;

    public function __construct(string $city)
    {
        $this->city = $city;
    }

    public function get(): string
    {
        return $this->city;
    }

    public function set($city)
    {
        $this->city = $city;
    }

    public function __toString()
    {
        return $this->city;
    }
}
