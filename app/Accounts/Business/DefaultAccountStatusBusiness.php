<?php

namespace App\Accounts\Business;

use App\Accounts\Data\Enums\AccountStatusEnum;
use Marcelofabianov\MicroServiceBuilder\Business\BusinessContract;

/**
 * Regra de negócio quando é criado um novo registro de conta e não informado
 * um status inicial para o registro é retornado o status definido nesta class
 */
class DefaultAccountStatusBusiness implements BusinessContract
{
    /**
     * @return AccountStatusEnum
     */
    public static function get(): AccountStatusEnum
    {
        return AccountStatusEnum::TRIAL_PROGRESS;
    }
}
