<?php

namespace Modules\Auth\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Auth\Contracts\AuthUserServiceContract;
use Modules\Auth\Contracts\BasicConfigContract;
use Modules\Auth\Dto\LoginDTO;
use Modules\Auth\Dto\RegisterDTO;
use Modules\Auth\Contracts\ServiceConfigContract;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class BaseAuthService implements AuthUserServiceContract
{
    public function __construct(private readonly ServiceConfigContract $config)
    {
    }

    public function register(RegisterDTO $registerDTO): User
    {
        // TODO: Implement register() method.
    }

    public function login(LoginDTO $loginDTO): User
    {
        // TODO: Implement login() method.
    }

    public function logout(User $user): User
    {
        $user->tokens()->delete();
        Auth::logout();

        return $user;
    }

    public function setUserProperties(User $user, BasicConfigContract $dto): void
    {
        DB::beginTransaction();
        try {
            foreach ($dto->toArray() as $key => $value) {
                $user->properties()->updateOrCreate([
                    'key' => $key,
                    'value' => $value
                ]);
            }
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            throw new RuntimeException($e->getMessage(), Response::HTTP_CONFLICT);
        }
    }
}
