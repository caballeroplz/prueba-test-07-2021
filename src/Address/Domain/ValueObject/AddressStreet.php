<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressStreet
{

    private string $street;

    public function __construct(string $street)
    {
        $this->street = $street;
    }

    public function get(): string
    {
        return $this->street;
    }

    public function set($street)
    {
        $this->street = $street;
    }

    public function __toString()
    {
        return $this->street;
    }
}