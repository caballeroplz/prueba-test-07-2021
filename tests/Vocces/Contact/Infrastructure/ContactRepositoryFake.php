<?php

namespace Tests\Vocces\Contact\Infrastructure;

use Vocces\Contact\Domain\Contact;
use Vocces\Contact\Domain\ContactRepositoryInterface;

class ContactRepositoryFake implements ContactRepositoryInterface
{
    public bool $callMethodCreate = false;

    /**
     * @inheritdoc
     */
    public function create(Contact $contact): void
    {
        $this->callMethodCreate = true;
    }
}
