<?php

namespace App\Http\Controllers\Api\Address;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Address\Application\AddressCreator;
use App\Http\Requests\Address\CreateAddressesRequest;

class PostCreateAddressController extends Controller
{
    /**
     * Create new Address
     *
     * @param \App\Http\Requests\Address\CreateAddressesRequest $request
     */

    public function __invoke(CreateAddressesRequest $request, AddressCreator $service)
    {
        DB::beginTransaction();
        try {
                
            $address = $service->handle(
                $request->street, 
                $request->streetnumber, 
                $request->floor,
                $request->letter,
                $request->postalcode,
                $request->city,
                $request->province,
                $request->country,
                $request->ownerid
            );
            DB::commit();
            return response($address, 201);
        } catch (\Throwable $error) {
            DB::rollback();
            throw $error;
        }
    }
}
