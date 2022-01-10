<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressLetter
{

    private string $letter;

    public function __construct(string $letter)
    {
        $this->letter = $letter;
    }

    public function get(): string
    {
        return $this->letter;
    }

    public function set($letter)
    {
        $this->letter = $letter;
    }

    public function __toString()
    {
        return $this->letter;
    }
}
