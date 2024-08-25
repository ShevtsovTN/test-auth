<?php

namespace Modules\Auth\Strategies;

use App\Dto\ServiceDTO;
use App\Enums\ServiceCodeEnum;
use Modules\Auth\Contracts\AuthUserHandlerContract;
use Modules\Auth\Contracts\AuthUserServiceContract;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Modules\Auth\Handlers\AstrowayAuthHandler;
use Modules\Auth\Handlers\PastLifeAuthHandler;
use Modules\Auth\Handlers\MindHealthyAuthHandler;
use Modules\Auth\Handlers\SurnameMysteryAuthHandler;
use Modules\Auth\Handlers\MyDreamAuthHandler;

readonly class AuthHandlerStrategy
{
    public function __construct(
        public AstrowayAuthHandler $astrowayAuthHandler,
        public PastLifeAuthHandler $pastLifeAuthHandler,
        public MindHealthyAuthHandler $mindHealthyAuthHandler,
        public SurnameMysteryAuthHandler $surnameMysteryAuthHandler,
        public MyDreamAuthHandler $myDreamAuthHandler,
    )
    {
    }

    public function getHandler(ServiceDTO $dto): AuthUserHandlerContract
    {
        return match ($dto->code) {
            ServiceCodeEnum::ASTROWAY => $this->astrowayAuthHandler,
            ServiceCodeEnum::PAST_LIFE => $this->pastLifeAuthHandler,
            ServiceCodeEnum::MIND_HEALTHY => $this->mindHealthyAuthHandler,
            ServiceCodeEnum::SURNAME_MYSTERY => $this->surnameMysteryAuthHandler,
            ServiceCodeEnum::MY_DREAM => $this->myDreamAuthHandler,
            default => throw new RuntimeException('Handler not found', Response::HTTP_NOT_FOUND),
        };
    }
}
