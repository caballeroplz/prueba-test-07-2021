<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class GetListAllCompanyController extends Controller
{

    public function __invoke()
    {
        $company = Company::all();
        echo (string)$company;
    }
}
