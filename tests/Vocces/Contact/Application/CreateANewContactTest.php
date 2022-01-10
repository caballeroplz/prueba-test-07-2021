<?php

namespace Test\Vocces\Contact\Application;

use Brick\Math\BigInteger;
use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Contact\Domain\Contact;
use Vocces\Contact\Application\ContactCreator;
use Tests\Vocces\Contact\Infrastructure\ContactRepositoryFake;

final class CreateANewContactTest extends TestCase
{
    /**
     * @group application
     * @group contact
     * @test
     */
    public function createANewContact()
    {
        
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testContact = [
            'ownerid'       => '1bdefa57-d372-4659-8794-fc213e498974',
            'value'         => (string)$faker->email,
            'type'          => 'email'
        ];

        /**
         * Actions
         */
        $creator = new ContactCreator(new ContactRepositoryFake());
        $contact = $creator->handle(
            $testContact['ownerid'],
            $testContact['value'],
            $testContact['type']

        );

        /**
         * Assert
         */
        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals($testContact, $contact->toArray());
    }
}
