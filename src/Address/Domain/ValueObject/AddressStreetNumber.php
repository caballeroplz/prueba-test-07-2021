<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressStreetNumber
{

    private string $streetnumber;

    public function __construct(string $streetnumber)
    {
        $this->streetnumber = $streetnumber;
    }

    public function get(): string
    {
        return $this->streetnumber;
    }

    public function set($streetnumber)
    {
        $this->streetnumber = $streetnumber;
    }

    public function __toString()
    {
        return $this->streetnumber;
    }
}
 