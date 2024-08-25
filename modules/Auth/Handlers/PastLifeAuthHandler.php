<?php

namespace Modules\Auth\Handlers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Contracts\AuthUserHandlerContract;
use Modules\Auth\Contracts\AuthUserServiceContract;
use Modules\Auth\Services\PastLifeAuthService;
use Modules\Auth\Http\Resources\PastLife\UserResource;

readonly class PastLifeAuthHandler implements AuthUserHandlerContract
{
    public function __construct(
        public PastLifeAuthService $service,
        public UserResource $resource,
    )
    {
    }

    public function getService(): AuthUserServiceContract
    {
        return $this->service;
    }

    public function getResource(): JsonResource
    {
        return $this->resource;
    }
}
