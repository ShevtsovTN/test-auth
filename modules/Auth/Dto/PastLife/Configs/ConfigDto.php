<?php

namespace Modules\Auth\Dto\PastLife\Configs;

use Modules\Auth\Contracts\BasicConfigContract;
use Modules\Auth\Dto\BaseDTO;

class ConfigDto extends BaseDTO implements BasicConfigContract
{
    public readonly int $requestCount;

    public function toArray(): array
    {
        return [
            'request_count' => $this->requestCount,
        ];
    }
}
