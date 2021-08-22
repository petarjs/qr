<?php

namespace Domain\Companies\Actions;

use Domain\Companies\Models\Company;
use Domain\Users\Models\User;

class FindCompanyByUserAction
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
     * @param User $
     * @return Company|null
     */
    public function execute(User $user): ?Company
    {
        return $user->company;
    }
}
