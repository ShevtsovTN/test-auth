<?php

namespace Modules\Auth\Dto\Astroway\Configs;

use Modules\Auth\Contracts\BasicConfigContract;
use Modules\Auth\Dto\BaseDTO;

class ConfigDto extends BaseDTO implements BasicConfigContract
{
    public readonly int $durationInDays;
    public readonly int $aiExpertsMessageCount;

    public function toArray(): array
    {
        return [
            'duration_in_days' => $this->durationInDays,
            'ai_experts_message_count' => $this->aiExpertsMessageCount,
        ];
    }
}
