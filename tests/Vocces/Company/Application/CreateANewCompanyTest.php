<?php

namespace Test\Vocces\Company\Application;

use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Application\CompanyCreator;
use Tests\Vocces\Company\Infrastructure\CompanyStatusRepositoryFake;
use Tests\Vocces\Company\Infrastructure\CompanyRepositoryFake;
use Tests\Vocces\Contact\Infrastructure\ContactRepositoryFake;
use Tests\Vocces\Address\Infrastructure\AddressRepositoryFake;


final class CreateANewCompanyTest extends TestCase
{
    /**
     * @group application
     * @group company
     * @test
     */
    public function createANewCompany()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testCompany = [
            'id'            => Str::uuid(),
            'name'          => $faker->name,
            'status'        => CompanyStatus::DISABLED,
            'value'         => $faker->email(),
            'type'          => 'email',
            'street'        => $faker->streetName,
            'streetnumber'  => $faker->buildingNumber,
            'floor'         => (string)$faker->randomDigit,
            'letter'        => $faker->randomLetter,
            'postalcode'    => (string)$faker->randomNumber(5),
            'city'          => $faker->city,
            'province'      => $faker->state,
            'country'       => $faker->country,

        ];

        /**
         * Actions
         */
        $creator = new CompanyCreator(new CompanyRepositoryFake(), new ContactRepositoryFake(), new AddressRepositoryFake(), new CompanyStatusRepositoryFake());
        $company = $creator->handle(
            $testCompany['id'],
            $testCompany['name'],
            $testCompany['status'],
            $testCompany['value'],
            $testCompany['type'],
            $testCompany['street'],
            $testCompany['streetnumber'],
            $testCompany['floor'],
            $testCompany['letter'],
            $testCompany['postalcode'],
            $testCompany['city'],
            $testCompany['province'],
            $testCompany['country']
        );

        /**
         * Assert
         */
        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals($testCompany, $company->toArray());
    }
}
