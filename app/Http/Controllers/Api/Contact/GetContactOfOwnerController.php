<?php

namespace App\Http\Controllers\Api\Contact;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Contact;



class GetContactOfOwnerController extends Controller
{
    public function __invoke()
    {
        $contact = Contact::all();
        //$contact = Contact::all('*')->where('ownerid','d452e7a6-f842-4b76-a02e-9a396b55e964');
        echo $contact;
       
    }
}
