<?php

namespace App\Users\CompanyUsers\Controllers;

use App\Users\CompanyUsers\ViewModels\CompanyUserIndexViewModel;
use Illuminate\Http\Request;

class CompanyUserController
{
    public function index(Request $request)
    {
        return (new CompanyUserIndexViewModel($request))->view('users.company-users.index');
    }
}
