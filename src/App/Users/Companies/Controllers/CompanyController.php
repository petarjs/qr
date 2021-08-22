<?php

namespace App\Users\Companies\Controllers;

use App\Users\Companies\ViewModels\CompanyViewModel;
use Illuminate\Http\Request;

class CompanyController
{
    public function show(Request $request)
    {
        return (new CompanyViewModel($request))->view('users.companies.show');
    }
}
