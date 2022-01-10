<?php

namespace App\Http\Controllers\Api\Company;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Address;
use App\Models\CompanyStatus;

class GetListAllCompanyAllDataController extends Controller
{

    public function __invoke()
    {
        $companies = Company::all();
        foreach($companies as $company)
        {
            echo json_encode($company);
            $status = CompanyStatus::find($company->id);
            echo json_encode($status);
            $contact = Contact::all()->where('ownerid','=',$company->id);
            echo json_encode($contact);
            $address = Address::all()->where('ownerid','=',$company->id);
            echo json_encode($address);
        
        }
    }
}
