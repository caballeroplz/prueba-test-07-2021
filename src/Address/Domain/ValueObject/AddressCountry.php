<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressCountry
{

    private string $country;

    public function __construct(string $country)
    {
        $this->country = $country;
    }

    public function get(): string
    {
        return $this->country;
    }

    public function set($country)
    {
        $this->country = $country;
    }

    public function __toString()
    {
        return $this->country;
    }
}
 