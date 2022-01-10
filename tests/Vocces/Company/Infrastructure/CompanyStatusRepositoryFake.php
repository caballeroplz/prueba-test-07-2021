<?php

namespace Tests\Vocces\Company\Infrastructure;

use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\CompanyStatusRepositoryInterface;

class CompanyStatusRepositoryFake implements CompanyStatusRepositoryInterface
{
    public bool $callMethodCreate = false;

    /**
     * @inheritdoc
     */
    public function create(int $companystatus, CompanyId $companyid): void
    {
        $this->callMethodCreate = true;
    }
}
