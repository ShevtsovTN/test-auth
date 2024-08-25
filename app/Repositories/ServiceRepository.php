<?php

namespace App\Repositories;

use App\Contracts\ServiceRepositoryContract;
use App\Dto\ServiceDTO;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryContract
{

    public function getOne(string $serviceUuid): ServiceDTO
    {
        $service = Service::query()
            ->where('uuid', $serviceUuid)
            ->first();
        return new ServiceDTO(
            $service->id,
            $service->name,
            $service->code,
            $service->action
        );
    }
}
