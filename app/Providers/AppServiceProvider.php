<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $bindingInterfaces = [
        \Vocces\Company\Domain\CompanyRepositoryInterface::class =>
            \Vocces\Company\Infrastructure\CompanyRepositoryEloquent::class,
            \Vocces\Contact\Domain\ContactRepositoryInterface::class =>
            \Vocces\Contact\Infrastructure\ContactRepositoryEloquent::class,
            \Vocces\Address\Domain\AddressRepositoryInterface::class =>
            \Vocces\Address\Infrastructure\AddressRepositoryEloquent::class,
            \Vocces\Company\Domain\CompanyStatusRepositoryInterface::class =>
            \Vocces\Company\Infrastructure\CompanyStatusRepositoryEloquent::class

    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->bindingInterfaces as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
