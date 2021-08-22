<?php

namespace Domain\Stores\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class StoreData extends DataTransferObject
{
    public string $name;

    public string $address;
}
