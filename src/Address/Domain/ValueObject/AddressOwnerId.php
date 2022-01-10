<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressOwnerId
{

    private string $ownerid;

    public function __construct(string $ownerid)
    {
        $this->ownerid = $ownerid;
    }

    public function get(): string
    {
        return $this->ownerid;
    }

    public function set($ownerid)
    {
        $this->owneid = $ownerid;
    }

    public function __toString()
    {
        return $this->ownerid;
    }
}