<?php

namespace Vocces\Contact\Application;

use Vocces\Contact\Domain\Contact;
use Vocces\Contact\Domain\ValueObject\ContactOwnerId;
use Vocces\Contact\Domain\ValueObject\ContactValue;
use Vocces\Contact\Domain\ValueObject\ContactType;
use Vocces\Contact\Domain\ContactRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class ContactCreator implements ServiceInterface
{
    /**
     * @var ContactRepositoryInterface $repository
     */
    private ContactRepositoryInterface $repository;

    /**
     * Create new instance
     */
    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new contact
     */
    public function handle(
        $ownerid, 
        $value,
        $type
    ) {
        $contact = new Contact(
            new ContactOwnerId($ownerid),
            new ContactValue($value),
            new ContactType($type)            
            );
            
        $this->repository->create($contact);
        
        return $contact;
    }
}
