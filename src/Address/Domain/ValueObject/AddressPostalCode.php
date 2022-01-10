<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressPostalCode
{

    private string $postalcode;

    public function __construct(string $postalcode)
    {
        $this->postalcode = $postalcode;
    }

    public function get(): string
    {
        return $this->postalcode;
    }

    public function set($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    public function __toString()
    {
        return $this->postalcode;
    }
}