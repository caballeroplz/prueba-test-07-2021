<?php

namespace Tests\Vocces\Address\Routes;

use Tests\TestCase;
use Illuminate\Support\Str;

class CreateNewAddressRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function postCreateNewAddressRoute()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testAddress = [
            'street'        => $faker->streetName,
            'streetnumber'  => (string)$faker->buildingNumber,
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
        $response = $this->json('POST', '/api/address', [
            'street'        => $testAddress['street'],
            'streetnumber'  => $testAddress['streetnumber'],
            'floor'         => $testAddress['floor'],
            'letter'        => $testAddress['letter'],
            'postalcode'    => $testAddress['postalcode'],
            'city'          => $testAddress['city'],
            'province'      => $testAddress['province'],
            'country'       => $testAddress['country'],
            'ownerid'       => $testAddress['ownerid']
        ]);

        /**
         * Asserts
         */$this->withoutExceptionHandling();
        $response->assertStatus(201)
            ->assertJsonFragment($testAddress);
    }
}
