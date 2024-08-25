<?php

namespace App\Contracts;

use App\Dto\ServiceDTO;

interface ServiceRepositoryContract
{
    public function getOne(string $serviceUuid): ServiceDTO;
}
