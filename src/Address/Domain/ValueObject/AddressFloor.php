<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressFloor
{

    private string $floor;

    public function __construct(string $floor)
    {
        $this->floor = $floor;
    }

    public function get(): string
    {
        return $this->floor;
    }

    public function set($floor)
    {
        $this->floor = $floor;
    }

    public function __toString()
    {
        return $this->floor;
    }
}
