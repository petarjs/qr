<?php

namespace Domain\Companies\Actions;

use Domain\Companies\Models\Company;
use Spatie\QueueableAction\QueueableAction;

class SaveCompanyLogoAction
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
    public function execute(Company $company): void
    {
        $company
            ->addMediaFromRequest('logo')
            ->addCustomHeaders([
                'ACL' => 'public-read'
            ])
            ->toMediaCollection('logo');
    }
}
