<?php

namespace App\Http\Controllers\Api\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Company\Application\CompanyCreator;
use App\Http\Requests\Company\CreateCompanyRequest;

class PostCreateCompanyController extends Controller
{
    /**
     * Create new company
     *
     * @param \App\Http\Requests\Company\CreateCompanyRequest $request
     */

    public function __invoke(CreateCompanyRequest $request, CompanyCreator $service)
    {
        DB::beginTransaction();
        try {
            $id = Str::uuid();   
            $company = $service->handle(
                $id,
                $request->name,
                $request->status,
                $request->value,
                $request->type,
                $request->street, 
                $request->streetnumber, 
                $request->floor,
                $request->letter,
                $request->postalcode,
                $request->city,
                $request->province,
                $request->country,
            );

            DB::commit();
            return response($company, 201);
        } catch (\Throwable $error) {
            DB::rollback();
            throw $error;
        }
    }
}
