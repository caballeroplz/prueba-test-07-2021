<?php

namespace App\Http\Controllers\Api\Company;
use App\Models\CompanyStatus as ModelCompanyStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\EnableCompanyRequest;


class PostEnableCompanyController extends Controller
{
    /**
     * Enable a company
     *
     * @param \App\Http\Requests\Company\EnableCompanyRequest $request
     */

    public function __invoke(EnableCompanyRequest $request)
    {
        $status = ModelCompanyStatus::where('ownerid', '=', $request->id)->first();
        
        $status->enable();
        $status->save();
        
     
        if(!$status){
            return response('Company status not found', 404);
        }
        
        return response($status, 201);
        
    }
}
