<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Dto\LoginDTO;
use Modules\Auth\Dto\RegisterDTO;

class DemoUserController extends Controller
{
    public function __construct(
        private readonly DemoUserAuthService $service
    )
    {
    }

    public function login(DemoUserLoginRequest $request): JsonResource
    {
        $dto = LoginDTO::fromRequest($request->validated());

        $user = $this->service->login($dto);

        return DemoUserResource::make($user);
    }

    public function register(DemoUserRegisterRequest $request): JsonResource
    {
        $dto = RegisterDTO::fromRequest($request->validated());
        $user = $this->service->register($dto);

        return DemoUserResource::make($user);
    }
}
