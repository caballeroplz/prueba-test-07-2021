<?php

namespace Vocces\Address\Application;

use Vocces\Address\Domain\Address;
use Vocces\Address\Domain\ValueObject\AddressStreet;
use Vocces\Address\Domain\ValueObject\AddressStreetNumber;
use Vocces\Address\Domain\ValueObject\AddressFloor;
use Vocces\Address\Domain\ValueObject\AddressLetter;
use Vocces\Address\Domain\ValueObject\AddressPostalCode;
use Vocces\Address\Domain\ValueObject\AddressCity;
use Vocces\Address\Domain\ValueObject\AddressProvince;
use Vocces\Address\Domain\ValueObject\AddressCountry;
use Vocces\Address\Domain\AddressRepositoryInterface;
use Vocces\Address\Domain\ValueObject\AddressOwnerId;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class AddressCreator implements ServiceInterface
{
    /**
     * @var AddressRepositoryInterface $repository
     */
    private AddressRepositoryInterface $repository;

    /**
     * Create new instance
     */
    public function __construct(AddressRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new address
     */
    public function handle(
        $street, 
        $streetnumber, 
        $floor, 
        $letter, 
        $postalcode, 
        $city, 
        $province, 
        $country,
        $ownerid
    ) {
        $address = new Address(
            new AddressStreet($street),
            new AddressStreetNumber($streetnumber),
            new AddressFloor($floor),
            new AddressLetter($letter),
            new AddressPostalCode($postalcode),
            new AddressCity($city),
            new AddressProvince($province),
            new AddressCountry($country),
            new AddressOwnerId($ownerid)
        );

        $this->repository->create($address);

        return $address;
    }
}
