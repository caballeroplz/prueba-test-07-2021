<?php

namespace App\Http\Controllers\Api\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Http\Requests\Address\FindAddressByOwnerIdRequest;


class PostAddressOfOwnerController extends Controller
{
    public function __invoke(FindAddressByOwnerIdRequest $request)
    {
        $address = Address::all('*')->where('ownerid',$request->ownerid);
        echo $address;
       
    }
}
