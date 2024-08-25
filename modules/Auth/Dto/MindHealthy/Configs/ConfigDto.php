<?php

namespace Modules\Auth\Dto\MindHealthy\Configs;

use Modules\Auth\Contracts\BasicConfigContract;
use Modules\Auth\Dto\BaseDTO;

class ConfigDto extends BaseDTO implements BasicConfigContract
{
    public readonly int $durationInDays;

    public function toArray(): array
    {
        return [
            'duration_in_days' => $this->durationInDays,
        ];
    }
}
