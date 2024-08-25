<?php

namespace Modules\Auth\Contracts;

interface ServiceConfigContract
{
    public function getBasicConfig(): BasicConfigContract;

    public function getTemporaryConfig(): BasicConfigContract;
}
