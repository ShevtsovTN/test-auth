<?php

namespace Modules\Auth\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface AuthUserHandlerContract
{
    public function getService(): AuthUserServiceContract;

    public function getResource(): JsonResource;
}
