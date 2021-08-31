<?php

namespace Domain\QRCodes\Actions;

use Domain\Companies\Actions\FindCompanyByUserAction;
use Domain\Companies\Models\Company;
use Domain\Menus\DataTransferObjects\MenuData;
use Domain\QRCodes\DataTransferObjects\QRCodeData;
use Domain\QRCodes\Models\QRCode;
use Domain\Stores\DataTransferObjects\StoreData;
use Domain\Stores\Models\Store;
use Domain\Users\Models\User;

class CreateQRCodeAction
{
    private GenerateQRCodeImageAction $generateQRCodeImageAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(GenerateQRCodeImageAction $generateQRCodeImageAction)
    {
        $this->generateQRCodeImageAction = $generateQRCodeImageAction;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(QRCodeData $data)
    {
        $qrCode = QRCode::create($data->toArray());
        $this->generateQRCodeImageAction->onQueue()->execute($qrCode);

        return $qrCode;
    }
}
