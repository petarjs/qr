<?php

namespace App\Users\CompanyUsers\ViewModels;

use App\Users\CompanyUsers\Queries\CompanyUsersIndexQuery;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class CompanyUserIndexViewModel extends ViewModel
{
    public LengthAwarePaginator $users;

    public function __construct(Request $request)
    {
        $companyUsersIndexQuery = new CompanyUsersIndexQuery($request);
        $this->users = $companyUsersIndexQuery->paginate();
    }
}
