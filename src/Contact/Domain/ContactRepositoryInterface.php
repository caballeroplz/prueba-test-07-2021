<?php

namespace Vocces\Contact\Domain;

interface ContactRepositoryInterface
{
    /**
     * Persist a new contact instance
     *
     * @param Contact $contact
     *
     * @return void
     */
    public function create(Contact $contact): void;
}
