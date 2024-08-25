<?php

namespace Modules\Auth\Handlers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Contracts\AuthUserHandlerContract;
use Modules\Auth\Contracts\AuthUserServiceContract;
use Modules\Auth\Services\MindHealthyAuthService;
use Modules\Auth\Http\Resources\MindHealthy\UserResource;

readonly class MindHealthyAuthHandler implements AuthUserHandlerContract
{
    public function __construct(
        public MindHealthyAuthService $service,
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
