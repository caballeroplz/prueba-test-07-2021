<?php

namespace Vocces\Address\Domain\ValueObject;

final class AddressProvince
{

    private string $province;

    public function __construct(string $province)
    {
        $this->province = $province;
    }

    public function get(): string
    {
        return $this->province;
    }

    public function set($province)
    {
        $this->province = $province;
    }

    public function __toString()
    {
        return $this->province;
    }
}
