<?php

namespace Modules\Auth\Contracts;

use App\Models\User;
use Modules\Auth\Dto\LoginDTO;
use Modules\Auth\Dto\RegisterDTO;

interface AuthUserServiceContract
{
    public function register(RegisterDTO $registerDTO): User;

    public function login(LoginDTO $loginDTO): User;

    public function logout(User $user): User;

    public function setUserProperties(User $user, BasicConfigContract $dto): void;
}
