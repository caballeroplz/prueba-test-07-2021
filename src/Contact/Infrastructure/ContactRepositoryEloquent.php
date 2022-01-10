<?php

namespace Vocces\Contact\Infrastructure;

use App\Models\Contact as ModelsContact;
use Vocces\Contact\Domain\Contact;
use Vocces\Contact\Domain\ContactRepositoryInterface;

class ContactRepositoryEloquent implements ContactRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(Contact $contact): void
    {
        ModelsContact::Create([
            'ownerid' => (string)$contact->ownerid(),
            'value'   => (string)$contact->value(),
            'type'    => (string)$contact->type()
        ]);
        
    }

}
