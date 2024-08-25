<?php

namespace Modules\Auth\Handlers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Contracts\AuthUserHandlerContract;
use Modules\Auth\Contracts\AuthUserServiceContract;
use Modules\Auth\Services\MyDreamAuthService;
use Modules\Auth\Http\Resources\MyDream\UserResource;

readonly class MyDreamAuthHandler implements AuthUserHandlerContract
{
    public function __construct(
        public MyDreamAuthService $service,
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
