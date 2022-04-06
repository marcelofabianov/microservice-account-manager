<?php

namespace App\Accounts\Http\Controllers;

use App\Accounts\Data\Enums\AccountStatusEnum;
use App\Accounts\Data\Repositories\AccountRepository;
use App\Accounts\Http\Resources\AccountCollection;
use Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class AccountsController extends Controller
{
    public function handle(Request $request): AccountCollection
    {
        $repository = new AccountRepository();

        $accounts = $repository->accounts(
            $request->has('status') ? AccountStatusEnum::from($request->get('status')) : null
        );

        $perPage = $request->get('per_page', env('PER_PAGE'));

        return new AccountCollection($accounts->simplePaginate($perPage));
    }
}
