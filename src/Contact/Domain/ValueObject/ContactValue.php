<?php

namespace Vocces\Contact\Domain\ValueObject;

final class ContactValue
{

    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function get(): string
    {
        return $this->value;
    }

    public function set(string $value)
    {
         $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
