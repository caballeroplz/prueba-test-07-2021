<?php

namespace Vocces\Address\Domain;

interface AddressRepositoryInterface
{
    /**
     * Persist a new address instance
     *
     * @param Address $address
     *
     * @return void
     */
    public function create(Address $address): void;
}
