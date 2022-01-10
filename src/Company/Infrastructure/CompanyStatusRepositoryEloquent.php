<?php

namespace Vocces\Company\Infrastructure;

use App\Models\CompanyStatus as ModelsCompanyStatus;
use Vocces\Company\Domain\CompanyStatusRepositoryInterface;
use Vocces\Company\Domain\ValueObject\CompanyId;

class CompanyStatusRepositoryEloquent implements CompanyStatusRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $companystatus, CompanyId $companyid): void
    {
        ModelsCompanyStatus::Create([
            //'id'        => $companystatus->id(),            
            'ownerid'   => $companyid,
            'status'    => $companystatus,
        ]);
        
    }
 
}
