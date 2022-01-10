<?php

namespace Test\Vocces\Address\Application;

use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Address\Domain\Address;
use Vocces\Address\Application\AddressCreator;
use Tests\Vocces\Address\Infrastructure\AddressRepositoryFake;

final class CreateANewAddressTest extends TestCase
{
    /**
     * @group application
     * @group address
     * @test
     */
    public function createANewAddress()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testAddress = [
            
            'street'        => $faker->streetName,
            'streetnumber'  => $faker->buildingNumber,
            'floor'         => (string)$faker->randomDigit,
            'letter'        => $faker->randomLetter,
            'postalcode'    => (string)$faker->randomNumber(5),
            'city'          => $faker->city,
            'province'      => $faker->state,
            'country'       => $faker->country,
            'ownerid'       => '1bdefa57-d372-4659-8794-fc213e498974'
			
        ];

        
        /**
         * Actions
         */
        $creator = new AddressCreator(new AddressRepositoryFake());
        $address = $creator->handle(
            $testAddress['street'],
            $testAddress['streetnumber'],
            $testAddress['floor'],
            $testAddress['letter'],
            $testAddress['postalcode'],
            $testAddress['city'],
            $testAddress['province'],
            $testAddress['country'],
            $testAddress['ownerid']
        );
        
        /**
         * Assert
         */
        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($testAddress, $address->toArray());
    }
}
