<?php

namespace Domain\QRCodes\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class QRCodeData extends DataTransferObject
{
    public string $text;
}
