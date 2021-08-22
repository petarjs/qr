<?php

namespace App\Users\Stores\Controllers;

use App\Users\Stores\Queries\StoresIndexQuery;
use App\Users\Stores\Requests\SaveStoreRequest;
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
    private StoresIndexQuery $storesIndexQuery;
    private FindCompanyByUserAction $findCompanyByUserAction;
    private CreateStoreAction $createStoreAction;
    private UpdateStoreAction $updateStoreAction;

    public function __construct(
        StoresIndexQuery $storesIndexQuery,
        FindCompanyByUserAction $findCompanyByUserAction,
        CreateStoreAction $createStoreAction,
        UpdateStoreAction $updateStoreAction,
    )
    {
        $this->storesIndexQuery = $storesIndexQuery;
        $this->findCompanyByUserAction = $findCompanyByUserAction;
        $this->createStoreAction = $createStoreAction;
        $this->updateStoreAction = $updateStoreAction;
    }

    public function index(Request $request)
    {
        return (new StoreIndexViewModel($this->storesIndexQuery))->view('users.stores.index');
    }

    public function createOrEdit(Store $store)
    {
        return (new StoreCreateViewModel($store))->view('users.stores.create');
    }

    public function save(SaveStoreRequest $request, ?Store $store)
    {
        $data = new StoreData($request->validated());

        $company = $this->findCompanyByUserAction->execute($request->user());

        if ($store) {
            $store = $this->updateStoreAction->execute($store, $data);
        } else {
            $store = $this->createStoreAction->execute($company, $data);
        }

        return redirect(route('users.stores.index'))
            ->with('flash.banner', "Store {$store->name} saved!");
    }
}
