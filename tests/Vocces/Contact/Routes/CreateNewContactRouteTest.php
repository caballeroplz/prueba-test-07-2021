<?php

namespace Tests\Vocces\Contact\Routes;

use Tests\TestCase;


class CreateNewContactRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function postCreateNewContactRoute()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testContact = [
            'ownerid'       => '1bdefa57-d372-4659-8794-fc213e498974',
            'value'         => $faker->email,
            'type'          => (string)'email'

        ];

        /**
         * Actions
         */
        $response = $this->json('POST', '/api/contact', [
            'ownerid'       => $testContact['ownerid'],
            'value'         => $testContact['value'],
            'type'          => $testContact['type']
        ]);
        
        /**
         * Asserts
         */
        $response->assertStatus(201)
            ->assertJsonFragment($testContact);
    }
}
