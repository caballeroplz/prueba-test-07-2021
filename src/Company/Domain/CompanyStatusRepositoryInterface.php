<?php

namespace Vocces\Company\Domain;

use Vocces\Company\Domain\ValueObject\CompanyId;

interface CompanyStatusRepositoryInterface
{
    /**
     * Persist a new status company instance
     *
     * @param int $companystatus
     *
     * @param CompanyId $companyid
     *
     * @return void
     */
    public function create(int $companystatus, CompanyId $companyid): void;
}
