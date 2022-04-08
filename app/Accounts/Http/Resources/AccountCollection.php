<?php

namespace App\Accounts\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

final class AccountCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $json = ['type' => 'Accounts'];
        $json['data'] = $this->collection;

        return $json;
    }
}
