<?php

namespace Modules\Auth\Dto;

use Modules\Auth\Contracts\BasicConfigContract;
use Modules\Auth\Contracts\ServiceConfigContract;

readonly class ConfigDTO implements ServiceConfigContract
{
    public function __construct(
        public BasicConfigContract $basicConfig,
        public BasicConfigContract $temporaryConfig
    )
    {}

    public function getBasicConfig(): BasicConfigContract
    {
        return $this->basicConfig;
    }

    public function getTemporaryConfig(): BasicConfigContract
    {
        return $this->temporaryConfig;
    }
}
