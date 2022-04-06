<?php

namespace App\Accounts\Data\Repositories;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use App\Accounts\Data\Enums\AccountStatusEnum;
use App\Accounts\Data\QueryFilters\AccountContainerFilters;
use Marcelofabianov\MicroServiceBuilder\Data\Repository\BaseRepository;
use Illuminate\Database\Query\Builder as QueryBuilder;

final class AccountRepository extends BaseRepository
{
    /**
     * Define Translate, Filters ...
     */
    protected function init()
    {
        $this->translate = AccountDtoTranslate::instance();
        $this->filter = AccountContainerFilters::instance();
    }

    /**s
     * @param AccountStatusEnum|null $status
     * @return QueryBuilder
     */
    public function accounts(AccountStatusEnum $status = null): QueryBuilder
    {
        $accounts = $this->get();

        if ($status) {
            $accounts = $this->filter->status($accounts, $status);
        }

        return $accounts;
    }
}
