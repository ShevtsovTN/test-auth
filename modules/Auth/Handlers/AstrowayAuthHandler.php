<?php

namespace Modules\Auth\Handlers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Contracts\AuthUserHandlerContract;
use Modules\Auth\Contracts\AuthUserServiceContract;
use Modules\Auth\Services\AstrowayAuthService;
use Modules\Auth\Http\Resources\Astroway\UserResource;

readonly class AstrowayAuthHandler implements AuthUserHandlerContract
{
    public function __construct(
        public AstrowayAuthService $service,
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
