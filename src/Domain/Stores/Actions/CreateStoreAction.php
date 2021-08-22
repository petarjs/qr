<?php

namespace Domain\Stores\Actions;

use Domain\Companies\Models\Company;
use Domain\Stores\DataTransferObjects\StoreData;
use Domain\Stores\Models\Store;

class CreateStoreAction
{
    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Company $company, StoreData $data)
    {
        $store = $company->stores()->create($data->toArray());

        return $store;
    }
}
