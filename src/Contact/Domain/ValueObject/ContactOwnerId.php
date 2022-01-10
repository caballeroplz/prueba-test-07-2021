<?php

namespace Vocces\Contact\Domain\ValueObject;

final class ContactOwnerId
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

    public function set(string $ownerid)
    {
        $this->ownerid = $ownerid;
    }

    public function __toString()
    {
        return $this->ownerid;
    }
}
