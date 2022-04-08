<?php

namespace App\Accounts\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

final class AccountResource extends JsonResource
{
    public function toArray($request): array
    {
        $json = [
            'id' => $this->id,
            'name' => $this->name,
            'document' => $this->document,
            'status' => $this->status,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'addressNumber' => $this->addressNumber,
            'addressComplement' => $this->addressComplement,
            'createdAt' => (Carbon::parse($this->createdAt))->toIso8601String(),
            'updatedAt' => (Carbon::parse($this->updatedAt))->toIso8601String(),
        ];

        if ($request->has('relationships')) {
            $json['relationships'] = [];
            if (in_array('users', $request->get('relationships'))) {
                $json['relationships'] = [
                    'users' => [
                        'links' => [
                            'related' => 'api/accounts/' . $this->id . '/users'
                        ]
                    ],
                ];
            }
        }

        if ($request->get('links') == true) {
            $json['links'] = ['self' => route('api.accounts.index')];
        }

        return $json;
    }
}
