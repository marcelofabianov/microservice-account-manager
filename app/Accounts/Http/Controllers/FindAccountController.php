<?php

namespace App\Accounts\Http\Controllers;

use App\Accounts\Data\Repositories\AccountRepository;
use App\Accounts\Http\Resources\AccountResource;
use Core\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final class FindAccountController extends Controller
{
    /**
     * @param int $id
     * @return JsonResponse|AccountResource
     */
    public function handle(int $id): JsonResponse|AccountResource
    {
        $repository = new AccountRepository();

        if ($account = $repository->find($id)) {
            return new AccountResource($account);
        }

        return response()->json([], 404);
    }
}
