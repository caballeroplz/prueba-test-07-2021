<?php

namespace Vocces\Address\Domain;

use Vocces\Address\Domain\ValueObject\AddressStreet;
use Vocces\Address\Domain\ValueObject\AddressStreetNumber;
use Vocces\Address\Domain\ValueObject\AddressFloor;
use Vocces\Address\Domain\ValueObject\AddressLetter;
use Vocces\Address\Domain\ValueObject\AddressPostalCode;
use Vocces\Address\Domain\ValueObject\AddressCity;
use Vocces\Address\Domain\ValueObject\AddressProvince;
use Vocces\Address\Domain\ValueObject\AddressCountry;
use Vocces\Address\Domain\ValueObject\AddressOwnerId;
use Vocces\Shared\Infrastructure\Interfaces\Arrayable;

class Address implements Arrayable
{
    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressStreet
     */
    private AddressStreet $street;

    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressStreetNumber
     */
    private AddressStreetNumber $streetnumber;

    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressFloor
     */
    private AddressFloor $floor;

    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressLetter
     */
    private AddressLetter $letter;
    
    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressPostalCode
     */
    private AddressPostalCode $postalcode;
    
    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressCity
     */
    private AddressCity $city;

    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressProvince
     */
    private AddressProvince $province;

    /**
     * @var \Vocces\Address\Domain\ValueObject\AddressCountry
     */
    private AddressCountry $country;
    
  /**
     * @var \Vocces\Address\Domain\ValueObject\AddressOwnerId
     */
    private AddressOwnerId $ownerid;

    public function __construct(
        AddressStreet $street, 
        AddressStreetNumber $streetnumber, 
        AddressFloor $floor,
        AddressLetter $letter,
        AddressPostalCode $postalcode,
        AddressCity $city,
        AddressProvince $province,
        AddressCountry $country,
        AddressOwnerId $ownerid
    ) {
        $this->street = $street;
        $this->streetnumber = $streetnumber;
        $this->floor = $floor;
        $this->letter = $letter;
        $this->postalcode = $postalcode;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
        $this->ownerid = $ownerid;
    }
    
    public function get(): string
    {
        return 
            $this->street .
            ', ' . 
            $this->streetnumber . 
            ' Floor ' . 
            $this->floor . 
            ' ' . 
            $this->letter . 
            '. ' . 
            $this->postalcode . 
            ' ' . 
            $this->city . 
            ' (' . 
            $this->province . 
            ') ' . 
            $this->country
        ;
    }

    public function setstreet(AddressStreet $street)
    {
        $this->street = $street;
    }
    public function street(): AddressStreet
    {
        return $this->street;
    }

    public function streetnumber(): AddressStreetNumber
    {
        return $this->streetnumber;
    }

    public function floor(): AddressFloor
    {
        return $this->floor;
    }

    public function letter(): AddressLetter
    {
        return $this->letter;
    }

    public function postalcode(): AddressPostalCode
    {
        return $this->postalcode;
    } 

    public function city(): AddressCity
    {
        return $this->city;    
    }

    public function province(): AddressProvince 
    {
        return $this->province;
    }

    public function country(): AddressCountry
    {
        return $this->country;
    }

    public function setownwerid(AddressOwnerId $ownerid)
    {
        $this->ownerid = $ownerid;
    }
    public function ownerid(): AddressOwnerId
    {
        return $this->ownerid;
    }

    public function toArray()
    {
        return [
            'street'        => (string)$this->street(),
            'streetnumber'  => (string)$this->streetnumber(),
            'floor'         => (string)$this->floor(),
            'letter'        => (string)$this->letter(),
            'postalcode'    => (string)$this->postalcode(),
            'city'          => (string)$this->city(),
            'province'      => (string)$this->province(),
            'country'       => (string)$this->country(),
            'ownerid'       => (string)$this->ownerid(),
        ];
    }

    public function __toString()
    {
        return [
            $this->street->get() .
            ', ' .
            $this->streetnumber->get() . 
            ' Floor ' . 
            $this->floor->get() . 
            ' ' . 
            $this->letter->get() . 
            '. ' . 
            $this->postalcode->get() . 
            ' ' . $this->city->get() . 
            ' (' . 
            $this->province->get() . 
            ') ' . 
            $this->country->get()
        ];
    }

}