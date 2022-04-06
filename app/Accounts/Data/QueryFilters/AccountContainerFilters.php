<?php

namespace App\Accounts\Data\QueryFilters;

use Marcelofabianov\MicroServiceBuilder\Data\QueryFilters\BaseContainerFilters;
use Marcelofabianov\MicroServiceBuilder\Data\QueryFilters\QueryContainerFiltersContract;

final class AccountContainerFilters extends BaseContainerFilters implements QueryContainerFiltersContract
{
    protected function setFilters()
    {
        $this->filters = [
            'status' => AccountStatusQueryFilter::class
        ];
    }
}
