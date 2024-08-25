<?php

namespace Modules\Auth\Http\Controllers;

use App\Contracts\ServiceRepositoryContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Dto\LoginDTO;
use Modules\Auth\Dto\RegisterDTO;
use Modules\Auth\Strategies\AuthHandlerStrategy;

class SocialiteController extends Controller
{
    public function __construct(
        private readonly ServiceRepositoryContract $serviceRepository,
        private readonly AuthHandlerStrategy $authHandlerStrategy
    )
    {
    }

    public function login(SocialiteLoginRequest $request): JsonResource
    {
        $dto = LoginDTO::fromRequest($request->validated());
        $serviceDto = $this->serviceRepository->getOne($dto->serviceUuid);

        $handler = $this->authHandlerStrategy->getHandler($serviceDto);

        $user = $handler->getService()->login($dto);

        return $handler->getResource()->make($user);
    }

    public function register(SocialiteRegisterRequest $request): JsonResource
    {
        $dto = RegisterDTO::fromRequest($request->validated());
        $serviceDto = $this->serviceRepository->getOne($dto->serviceUuid);

        $handler = $this->authHandlerStrategy->getHandler($serviceDto);

        $user = $handler->getService()->register($dto);

        return $handler->getResource()->make($user);
    }
}
