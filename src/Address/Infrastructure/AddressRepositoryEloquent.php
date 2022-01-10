<?php

namespace Vocces\Address\Infrastructure;

use App\Models\Address as ModelsAddress;
use Vocces\Address\Domain\Address;
use Vocces\Address\Domain\AddressRepositoryInterface;

class AddressRepositoryEloquent implements AddressRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(Address $address): void
    {
        ModelsAddress::Create([
            'street'        => $address->street(),
            'streetnumber'  => $address->streetnumber(),
            'floor'         => $address->floor(),
            'letter'        => $address->letter(),
            'postalcode'    => $address->postalcode(),
            'city'          => $address->city(),
            'province'      => $address->province(),
            'country'       => $address->country(),
            'ownerid'       => $address->ownerid()
        ]);
        
    }

}
