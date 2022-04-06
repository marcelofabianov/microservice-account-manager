<?php

namespace App\Accounts\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

final class AccountCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $json = ['type' => ''];
        $json['data'] = $this->collection;

        if ($request->get('links') == true) {
            $json['links'] = ['self' => ''];
        }

        return $json;
    }
}
