<?php

namespace Domain\Stores\Actions;

use Domain\Companies\Models\Company;
use Domain\Stores\DataTransferObjects\StoreData;
use Domain\Stores\Models\Store;

class UpdateStoreAction
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
    public function execute(Store $store, StoreData $data)
    {
        $store->update($data->toArray());

        return $store->refresh();
    }
}
