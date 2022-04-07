<?php

namespace App\Accounts\Data\QueryFilters;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use Marcelofabianov\MicroServiceBuilder\Data\QueryFilters\BaseQueryFilter;
use Marcelofabianov\MicroServiceBuilder\Data\QueryFilters\QueryFilterContract;
use Illuminate\Database\Query\Builder as QueryBuilder;

final class AccountStatusQueryFilter extends BaseQueryFilter implements QueryFilterContract
{
    protected function setTranslate()
    {
        $this->translate = AccountDtoTranslate::instance();
    }

    /**
    * @param  QueryBuilder $queryBuilder
    * @param  $data
    * @return QueryBuilder
    */
    public function apply(QueryBuilder $queryBuilder, $data): QueryBuilder
    {
        return $queryBuilder->where($this->translate->getAttributeSource('status'), $data);
    }
}
