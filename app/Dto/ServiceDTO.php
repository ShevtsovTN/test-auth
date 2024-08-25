<?php

namespace App\Dto;

use App\Enums\ServiceActionEnum;
use App\Enums\ServiceCodeEnum;

readonly class ServiceDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public ServiceCodeEnum $code,
        public ServiceActionEnum $action
    ) {
    }
}
