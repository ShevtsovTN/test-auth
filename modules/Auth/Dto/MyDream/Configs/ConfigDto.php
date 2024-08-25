<?php

namespace Modules\Auth\Dto\MyDream\Configs;

use Modules\Auth\Contracts\BasicConfigContract;
use Modules\Auth\Dto\BaseDTO;

/**
 * Class ConfigDto
 * @package Modules\Auth\Dto\MyDream\Configs
 *
 */
class ConfigDto extends BaseDTO implements BasicConfigContract
{
    public readonly int $requestCount;
    public readonly int $aiExpertsMessageCount;

    public function toArray(): array
    {
        return [
            'request_count' => $this->requestCount,
            'ai_experts_message_count' => $this->aiExpertsMessageCount,
        ];
    }
}
