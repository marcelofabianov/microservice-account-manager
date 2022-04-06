<?php

namespace App\Accounts\Service;

use App\Accounts\Business\DefaultAccountStatusBusiness;
use App\Accounts\Data\Dto\AccountDto;
use App\Accounts\Data\Enums\AccountStatusEnum;
use App\Accounts\Data\Repositories\CreateAccountRepository;
use Carbon\Carbon;
use Marcelofabianov\MicroServiceBuilder\Service\BaseService;
use ReflectionException;
use Throwable;

final class CreateAccountService extends BaseService
{
    /**
     * @return array
     */
    public function execute(): array
    {
        $data = [
            'document' => $this->data['document'],
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'phone' => $this->data['phone'],
            'address' => $this->data['address'],
            'addressNumber' => $this->data['addressNumber'],
            'addressComplement' => $this->data['addressComplement'],
            'createdAt' => Carbon::now(),
            'updatedAt' => Carbon::now()
        ];

        $data['status'] = DefaultAccountStatusBusiness::get();

        if (isset($this->data['status'])) {
            $data['status'] = AccountStatusEnum::from($this->data['status']);
        }

        try {
            $account = AccountDto::from($data);
        } catch (ReflectionException|Throwable $e) {
            dd($e);
        }

        $repository = new CreateAccountRepository();

        return $repository->save($account);
    }
}
