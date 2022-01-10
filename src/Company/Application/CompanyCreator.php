<?php

namespace Vocces\Company\Application;

use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Contact\Domain\ValueObject\ContactType;
use Vocces\Contact\Domain\ValueObject\ContactValue;
use Vocces\Address\Domain\ValueObject\AddressStreet;
use Vocces\Address\Domain\ValueObject\AddressStreetNumber;
use Vocces\Address\Domain\ValueObject\AddressFloor;
use Vocces\Address\Domain\ValueObject\AddressLetter;
use Vocces\Address\Domain\ValueObject\AddressPostalCode;
use Vocces\Address\Domain\ValueObject\AddressCity;
use Vocces\Address\Domain\ValueObject\AddressProvince;
use Vocces\Address\Domain\ValueObject\AddressCountry;
use Vocces\Company\Domain\CompanyRepositoryInterface;
use Vocces\Contact\Domain\ContactRepositoryInterface;
use Vocces\Address\Domain\AddressRepositoryInterface;
use Vocces\Company\Domain\CompanyStatusRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class CompanyCreator implements ServiceInterface
{
    /**
     * @var CompanyRepositoryInterface $repository
     */
    private CompanyRepositoryInterface $repository;

    /**
     * @var ContactRepositoryInterface $contactrepository
     */
    private ContactRepositoryInterface $contactrepository;

    /**
     * @var AddressRepositoryInterface $addressrepository
     */
    private AddressRepositoryInterface $addressrepository;

    /**
     * @var CompanyStatusRepositoryInterface $companystatusrepository
     */
    private CompanyStatusRepositoryInterface $statusrepository;

    /**
     * Create new instance
     */

     public function __construct(CompanyRepositoryInterface $repository, ContactRepositoryInterface $contactrepository,AddressRepositoryInterface $addressrepository, CompanyStatusRepositoryInterface $statusrepository)
    {
        $this->repository = $repository;
        $this->contactrepository = $contactrepository;
        $this->addressrepository = $addressrepository;
        $this->statusrepository = $statusrepository;
    }

     /**
     * Create a new company
     */
    public function handle(
        $id, 
        $name,
        $status,
        $value,
        $type,
        $street,     
        $streetnumber,
        $floor,
        $letter,     
        $postalcode, 
        $city,       
        $province,   
        $country    

    ) {
        $company = new Company(
            new CompanyId($id),
            new CompanyName($name),
            CompanyStatus::DISABLED,
            new ContactValue($value),
            new ContactType($type),
            new AddressStreet($street), 
            new AddressStreetNumber($streetnumber), 
            new AddressFloor($floor),
            new AddressLetter($letter),
            new AddressPostalCode($postalcode),
            new AddressCity($city),
            new AddressProvince($province),
            new AddressCountry($country)
            );
     
            
        $this->repository->create($company);
        $this->statusrepository->create($company->status(),$company->id());
        $this->contactrepository->create($company->contact());
        $this->addressrepository->create($company->address());

        return $company;
    }
}
