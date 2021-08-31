<?php

namespace Domain\QRCodes\Actions;

use Domain\QRCodes\Models\QRCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;
use Spatie\QueueableAction\QueueableAction;

class GenerateQRCodeImageAction
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(QRCode $qrCode): void
    {
        $qrCodeSvg = QrCodeGenerator::generate($qrCode->text);
        $qrCode
            ->addMediaFromString($qrCodeSvg)
            ->usingFileName("{$qrCode->id}.svg")
            ->addCustomHeaders([
                'ACL' => 'public-read'
            ])
            ->toMediaCollection('qr');
    }
}
