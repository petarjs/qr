<?php

namespace App\Users\Stores\Controllers;

use App\Users\Stores\Requests\SaveStoreRequest;
use App\Users\Stores\Requests\ViewStoreRequest;
use App\Users\Stores\ViewModels\StoreCreateViewModel;
use App\Users\Stores\ViewModels\StoreIndexViewModel;
use Domain\Companies\Actions\FindCompanyByUserAction;
use Domain\Stores\Actions\CreateStoreAction;
use Domain\Stores\Actions\SaveStoreAction;
use Domain\Stores\Actions\UpdateStoreAction;
use Domain\Stores\DataTransferObjects\StoreData;
use Domain\Stores\Models\Store;
use Illuminate\Http\Request;

class StoreController
{
    private FindCompanyByUserAction $findCompanyByUserAction;
    private CreateStoreAction $createStoreAction;
    private UpdateStoreAction $updateStoreAction;

    public function __construct(
        FindCompanyByUserAction $findCompanyByUserAction,
        CreateStoreAction       $createStoreAction,
        UpdateStoreAction       $updateStoreAction,
    )
    {
        $this->findCompanyByUserAction = $findCompanyByUserAction;
        $this->createStoreAction = $createStoreAction;
        $this->updateStoreAction = $updateStoreAction;
    }

    public function index(Request $request)
    {
        return (new StoreIndexViewModel($request))->view('users.stores.index');
    }

    public function createOrEdit(ViewStoreRequest $request, Store $store)
    {
        return (new StoreCreateViewModel($store))->view('users.stores.create');
    }

    public function save(SaveStoreRequest $request, ?Store $store)
    {
        $data = new StoreData($request->validated());

        $company = $this->findCompanyByUserAction->execute($request->user());

        if ($store->id !== null) {
            $store = $this->updateStoreAction->execute($store, $data);
        } else {
            $store = $this->createStoreAction->execute($company, $data);
        }

        return redirect(route('users.stores.index'))
            ->with('flash.banner', "Store {$store->name} saved!");
    }
}
