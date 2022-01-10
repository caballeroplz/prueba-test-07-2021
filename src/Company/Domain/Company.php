<?php

namespace Vocces\Company\Domain;

use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Shared\Infrastructure\Interfaces\Arrayable;
use Vocces\Contact\Domain\Contact;
use Vocces\Contact\Domain\ValueObject\ContactOwnerId;
use Vocces\Contact\Domain\ValueObject\ContactValue;
use Vocces\Contact\Domain\ValueObject\ContactType;
use Vocces\Address\Domain\Address;
use Vocces\Address\Domain\ValueObject\AddressStreet;
use Vocces\Address\Domain\ValueObject\AddressStreetNumber;
use Vocces\Address\Domain\ValueObject\AddressFloor;
use Vocces\Address\Domain\ValueObject\AddressLetter;
use Vocces\Address\Domain\ValueObject\AddressPostalCode;
use Vocces\Address\Domain\ValueObject\AddressCity;
use Vocces\Address\Domain\ValueObject\AddressProvince;
use Vocces\Address\Domain\ValueObject\AddressCountry;
use Vocces\Address\Domain\ValueObject\AddressOwnerId;

final class Company implements Arrayable
{
    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyId
     */
    private CompanyId $id;

    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyName
     */
    private CompanyName $name;

    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyStatus
     */
    private CompanyStatus $status;
    
    /**
     * @var \Vocces\Address\Domain\Address
     */
    private Address $address;

    /**
     * @var \Vocces\Contact\Domain\Contact
     */
    private Contact $contact;

    public function __construct(
        CompanyId $id,
        CompanyName $name,
        int $status,
        ContactValue $value,
        ContactType $type,
        AddressStreet $street, 
        AddressStreetNumber $streetnumber, 
        AddressFloor $floor,
        AddressLetter $letter,
        AddressPostalCode $postalcode,
        AddressCity $city,
        AddressProvince $province,
        AddressCountry $country


    ) {
        $this->id = $id;
        $this->name = $name;
        $this->status = new CompanyStatus($status,$id);
        if($value != NULL && $type != NULL)
        {
            $this->setcontact($value ,$type);
        }

        $this->setaddress($street,$streetnumber,$floor,$letter,$postalcode,$city,$province,$country);
    }

    
    
    public function setid(CompanyId $id)
    {
        $this->id = $id;
    }

    public function id(): CompanyId
    {
        return $this->id;
    }

    public function setname(CompanyName $name)
    {
        $this->name = $name;
    }
    public function name(): CompanyName
    {
        return $this->name;
    }

    public function setstatus(int $status){
        $this->status = $status;
    }

    public function status(): int
    {
        return $this->status->code();
    }

    public function setcontact(ContactValue $value, ContactType $type)
    {
        $this->contact = new Contact(
                                new ContactOwnerId((string)$this->id()),
                                $value,
                                $type
                            );
    }
    public function setaddress(AddressStreet $street, 
                                AddressStreetNumber $streetnumber, 
                                AddressFloor $floor,
                                AddressLetter $letter,
                                AddressPostalCode $postalcode,
                                AddressCity $city,
                                AddressProvince $province,
                                AddressCountry $country
    ) {
        $this->address = new Address(
                                $street, 
                                $streetnumber, 
                                $floor,
                                $letter,
                                $postalcode,
                                $city,
                                $province,
                                $country,
                                new AddressOwnerId((string)$this->id())
                            );
    }


    public function toArray()
    {
        return [
            'id'            => $this->id()->get(),
            'name'          => $this->name()->get(),
            'status'        => $this->status->code(),
            'value'         => (string)$this->contact->value(),
            'type'          => (string)$this->contact->type(),
            'street'        => (string)$this->address->street(),
            'streetnumber'  => (string)$this->address->streetnumber(),
            'floor'         => (string)$this->address->floor(),
            'letter'        => (string)$this->address->letter(),
            'postalcode'    => (string)$this->address->postalcode(),
            'city'          => (string)$this->address->city(),
            'province'      => (string)$this->address->province(),
            'country'       => (string)$this->address->country()
            
        ];
    }

    public function contact(): Contact
    {
        return $this->contact;
    }

    
    public function address(): Address
    {
        return $this->address;
    }

    // public function enable(): CompanyStatus
    // {
    //     $this->status->enable();
    //     return $this->status();
    // }
}
