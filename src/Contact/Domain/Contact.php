<?php

namespace Vocces\Contact\Domain;

use Vocces\Contact\Domain\ValueObject\ContactType;
use Vocces\Contact\Domain\ValueObject\ContactValue;
use Vocces\Contact\Domain\ValueObject\ContactOwnerId;
use Vocces\Shared\Infrastructure\Interfaces\Arrayable;

class Contact implements Arrayable
{
   /**
    * @var \Vocces\Contact\Domain\ValueObject\ContactValue
    */
   private ContactValue $value;

    /**
     * @var \Vocces\Contact\Domain\ValueObject\ContactType
     */
    private ContactType $type;

    /**
     * @var \Vocces\Contact\Domain\ValueObject\ContactOwnerId
     */
    private ContactOwnerId $ownerid;

    public function __construct(ContactOwnerId $ownerid, ContactValue $value, ContactType $type)
    {
        $this->ownerid = $ownerid;
        $this->value = $value;
        $this->type = $type; 
        
    }
    public function set(string $ownerid, string $value, string $type)
    {
        $this->ownerid = $ownerid;
        $this->value = $value;
        $this->type = $type;
    }

    public function ownerid(): ContactOwnerId
    {
        return $this->ownerid;
    }

    public function setownerid(ContactOwnerId $ownerid)
    {
        $this->ownerid = $ownerid;
    }

    public function value(): ContactValue
    {
        return $this->value;
    }

    public function setvalue(ContactValue $value)
    {
        $this->value = $value;
    }

    public function type(): ContactType
    {
        return $this->type;
    }

    public function settype(ContactType $type)
    {
        $this->type = $type;
    }

    public function toArray()
    {
        return [
            'ownerid'   => (string)$this->ownerid(),
            'value'     => (string)$this->value(),
            'type'      => (string)$this->type()
        ];
    }
}