<?php

namespace App\Accounts\Http\Controllers;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use App\Accounts\Http\Requests\CreateAccountRequest;
use App\Accounts\Http\Resources\AccountResource;
use App\Accounts\Service\CreateAccountService;
use Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

final class CreateAccountController extends Controller
{
    /**
     * @param Request $request
     * @return AccountResource
     * @throws ValidationException
     */
    public function handle(Request $request): AccountResource
    {
        $this->validate($request, CreateAccountRequest::rules());

        $translate = AccountDtoTranslate::instance();
        $attributes = $translate->getAttributesDto();

        $service = new CreateAccountService();
        $service->setData($request->only($attributes));

        $account = $service->execute();

        return new AccountResource((object) $account);
    }
}
