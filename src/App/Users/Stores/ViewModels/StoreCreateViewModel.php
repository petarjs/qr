<?php

namespace App\Users\Stores\ViewModels;

use Domain\Companies\Models\Company;
use Domain\Stores\Models\Store;
use Spatie\ViewModels\ViewModel;

class StoreCreateViewModel extends ViewModel
{
    public Company $company;
    public ?Store $store;

    public function __construct(?Store $store)
    {
        $this->store = $store;
        $this->company = auth()->user()->company;
    }

    public function isEditing()
    {
        return $this->store()->id != null;
    }

    public function store(): Store
    {
        return $this->store ?? new Store();
    }
}
