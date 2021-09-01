<?php

namespace Domain\Companies\Actions;

use Domain\Companies\DataTransferObjects\CompanyData;
use Domain\Companies\Models\Company;
use Spatie\QueueableAction\QueueableAction;

class UpdateCompanyAction
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Company $company, CompanyData $data): Company
    {
        $company->update($data->toArray());

        return $company->refresh();
    }
}
