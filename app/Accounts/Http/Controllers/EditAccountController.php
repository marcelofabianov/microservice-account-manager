<?php

namespace App\Accounts\Http\Controllers;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use App\Accounts\Data\Repositories\AccountRepository;
use App\Accounts\Http\Requests\EditAccountRequest;
use App\Accounts\Http\Resources\AccountResource;
use App\Accounts\Service\EditAccountService;
use Core\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use ReflectionException;
use Throwable;

final class EditAccountController extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return AccountResource|JsonResponse
     * @throws ValidationException
     * @throws ReflectionException
     * @throws Throwable
     */
    public function handle(Request $request, int $id): AccountResource|JsonResponse
    {
        $this->validate($request, EditAccountRequest::rules());

        $repository = new AccountRepository();
        $account = $repository->find($id);

        if (!$account) {
            return response()->json([], 404);
        }

        $translate = AccountDtoTranslate::instance();
        $attributes = $translate->getAttributesDto();

        $service = new EditAccountService();
        $service->setData($request->only($attributes));
        $service->setDataUpdate((array) $account);
        $service->setId($id);

        $account = $service->execute();

        return new AccountResource((object) $account);
    }
}
