<?php

namespace Vocces\Contact\Domain\ValueObject;

final class ContactType
{

    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function get(): string
    {
        return $this->type;
    }

    public function set(string $type)
    {
        $this->type = $type;
    }

    public function __toString()
    {
        return $this->type;
    }
}
