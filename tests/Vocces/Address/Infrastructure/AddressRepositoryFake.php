<?php

namespace Tests\Vocces\Address\Infrastructure;

use Vocces\Address\Domain\Address;
use Vocces\Address\Domain\AddressRepositoryInterface;

class AddressRepositoryFake implements AddressRepositoryInterface
{
    public bool $callMethodCreate = false;

    /**
     * @inheritdoc
     */
    public function create(Address $address): void
    {
        $this->callMethodCreate = true;
    }
}
