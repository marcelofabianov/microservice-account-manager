<?php

namespace App\Accounts\Http\Requests;

final class CreateAccountRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'name' => 'required|min:7',
            'document' => 'required|min:11|max:14'
        ];
    }
}
