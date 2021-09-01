<?php

namespace App\Users\Companies\Controllers;

use App\Users\Companies\Requests\EditCompanyRequest;
use App\Users\Companies\Requests\UpdateCompanyRequest;
use App\Users\Companies\Requests\ViewCompanyRequest;
use App\Users\Companies\ViewModels\CompanyViewModel;
use Domain\Companies\Actions\FindCompanyByUserAction;
use Domain\Companies\Actions\SaveCompanyLogoAction;
use Domain\Companies\Actions\UpdateCompanyAction;
use Domain\Companies\DataTransferObjects\CompanyData;
use Illuminate\Http\Request;

class CompanyController
{
    private UpdateCompanyAction $updateCompanyAction;
    private FindCompanyByUserAction $findCompanyByUserAction;
    private SaveCompanyLogoAction $saveCompanyLogoAction;

    public function __construct(
        UpdateCompanyAction $updateCompanyAction,
        FindCompanyByUserAction $findCompanyByUserAction,
        SaveCompanyLogoAction $saveCompanyLogoAction,
    )
    {
        $this->updateCompanyAction = $updateCompanyAction;
        $this->findCompanyByUserAction = $findCompanyByUserAction;
        $this->saveCompanyLogoAction = $saveCompanyLogoAction;
    }

    public function show(ViewCompanyRequest $request)
    {
        return (new CompanyViewModel($request))->view('users.companies.show');
    }

    public function edit(EditCompanyRequest $request)
    {
        return (new CompanyViewModel($request))->view('users.companies.edit');
    }

    public function update(UpdateCompanyRequest $request)
    {
        $logo = $request->logo;
        $data = new CompanyData($request->only(['name', 'currency']));
        $company = $this->findCompanyByUserAction->execute($request->user());

        $this->updateCompanyAction->execute($company, $data);

        if ($logo) {
            $this->saveCompanyLogoAction->onQueue()->execute($company);
        }

        return redirect(route('users.companies.show'))
            ->with('flash.banner', "Company saved!");
    }
}
