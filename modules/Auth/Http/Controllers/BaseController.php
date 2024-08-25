<?php

namespace Modules\Auth\Http\Controllers;

use App\Contracts\ServiceRepositoryContract;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Dto\LoginDTO;
use Modules\Auth\Dto\LogoutDTO;
use Modules\Auth\Dto\RegisterDTO;
use Modules\Auth\Strategies\AuthHandlerStrategy;

class BaseController extends Controller
{
    public function __construct(
        private readonly ServiceRepositoryContract $serviceRepository,
        private readonly AuthHandlerStrategy $authHandlerStrategy
    )
    {
    }

    public function login(LoginRequest $request): JsonResource
    {
        $dto = LoginDTO::fromRequest($request->validated());
        $serviceDto = $this->serviceRepository->getOne($dto->serviceUuid);

        $handler = $this->authHandlerStrategy->getHandler($serviceDto);

        $user = $handler->getService()->login($dto);

        return $handler->getResource()->make($user);
    }

    public function register(RegisterRequest $request): JsonResource
    {
        $dto = RegisterDTO::fromRequest($request->validated());
        $serviceDto = $this->serviceRepository->getOne($dto->serviceUuid);

        $handler = $this->authHandlerStrategy->getHandler($serviceDto);

        $user = $handler->getService()->register($dto);

        return $handler->getResource()->make($user);
    }

    public function logout(LogoutRequest $request): JsonResource
    {
        /** @var User $user */
        $user = auth()->user();

        $dto = LogoutDTO::fromRequest($request->validated());
        $serviceDto = $this->serviceRepository->getOne($dto->serviceUuid);

        $handler = $this->authHandlerStrategy->getHandler($serviceDto);

        $user = $handler->getService()->logout($user);

        return $handler->getResource()->make($user);
    }

    public function upgradeTemporary(UpgradeTemporary $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $dto = LogoutDTO::fromRequest($request->validated());
        $serviceDto = $this->serviceRepository->getOne($dto->serviceUuid);

        $handler = $this->authHandlerStrategy->getHandler($serviceDto);

        $user = $handler->getService()->upgradeTemporary($dto);

        return $handler->getResource()->make($user);
    }
}
