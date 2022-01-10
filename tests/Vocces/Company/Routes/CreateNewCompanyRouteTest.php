<?php

namespace Tests\Vocces\Company\Routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Vocces\Company\Domain\ValueObject\CompanyStatus;

class CreateNewCompanyRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function postCreateNewCompanyRoute()
    {
        
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testCompany = [
            'name'          => $faker->name,
            'status'        => (integer)CompanyStatus::DISABLED,
            'value'         => $faker->email(),
            'type'          => 'email',
            'street'        => $faker->streetName,
            'streetnumber'  => (string)$faker->buildingNumber,
            'floor'         => (string)$faker->randomDigit,
            'letter'        => $faker->randomLetter,
            'postalcode'    => (string)$faker->randomNumber(5),
            'city'          => $faker->city,
            'province'      => $faker->state,
            'country'       => $faker->country
        ];

        /**
         * Actions
         */
        $response = $this->json('POST', '/api/company', [
            'name'          => $testCompany['name'],
            'status'        => $testCompany['status'],
            'value'         => $testCompany['value'],
            'type'          => $testCompany['type'],
            'street'        => $testCompany['street'],
            'streetnumber'  => $testCompany['streetnumber'],
            'floor'         => $testCompany['floor'],
            'letter'        => $testCompany['letter'],
            'postalcode'    => $testCompany['postalcode'],
            'city'          => $testCompany['city'],
            'province'      => $testCompany['province'],
            'country'       => $testCompany['country']
        ]);

        /**
         * Asserts
         */
        $response->assertStatus(201)
            ->assertJsonFragment($testCompany);
    }
}
