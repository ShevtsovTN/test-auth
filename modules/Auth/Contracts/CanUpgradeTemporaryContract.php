<?php

namespace Modules\Auth\Contracts;

use App\Models\User;
use Modules\Auth\Dto\UpgradeTemporaryDTO;

interface CanUpgradeTemporaryContract
{
    public function upgradeTemporary(UpgradeTemporaryDTO $dto): User;
}
