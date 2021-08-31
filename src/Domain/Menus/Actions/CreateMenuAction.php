<?php

namespace Domain\Menus\Actions;

use Domain\Companies\Actions\FindCompanyByUserAction;
use Domain\Companies\Models\Company;
use Domain\Menus\DataTransferObjects\MenuData;
use Domain\QRCodes\Actions\CreateQRCodeAction;
use Domain\QRCodes\DataTransferObjects\QRCodeData;
use Domain\Stores\DataTransferObjects\StoreData;
use Domain\Stores\Models\Store;
use Domain\Users\Models\User;

class CreateMenuAction
{
    private FindCompanyByUserAction $findCompanyByUserAction;
    private CreateQRCodeAction $createQRCodeAction;
    private GenerateMenuURLAction $generateMenuURLAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(
        FindCompanyByUserAction $findCompanyByUserAction,
        CreateQRCodeAction $createQRCodeAction,
        GenerateMenuURLAction $generateMenuURLAction,
    )
    {
        $this->findCompanyByUserAction = $findCompanyByUserAction;
        $this->createQRCodeAction = $createQRCodeAction;
        $this->generateMenuURLAction = $generateMenuURLAction;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(User $user, MenuData $data)
    {
        $company = $this->findCompanyByUserAction->execute($user);
        $menu = $company->menus()->create($data->toArray());
        $menuUrl = $this->generateMenuURLAction->execute($menu);
        $qrCodeData = new QRCodeData(['text' => $menuUrl]);
        $qrCode = $this->createQRCodeAction->execute($qrCodeData);
        $menu->update(['qr_code_id' => $qrCode->id]);

        return $menu;
    }
}
