<?php

namespace App\Users\Companies\ViewModels;

use Domain\Companies\Models\Company;
use Illuminate\Http\Request;
use Spatie\ViewModels\ViewModel;

class CompanyViewModel extends ViewModel
{
    public Company $company;

    public function __construct(Request $request)
    {
        $user = $request->user();
        $this->company = $user->company;
    }
}
