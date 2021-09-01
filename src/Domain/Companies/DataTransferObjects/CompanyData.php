<?php

namespace Domain\Companies\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CompanyData extends DataTransferObject
{
    public string $name;

    public string $currency;
}
