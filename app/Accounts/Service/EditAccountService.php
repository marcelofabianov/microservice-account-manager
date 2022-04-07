<?php

namespace App\Accounts\Service;

use App\Accounts\Data\Dto\AccountDto;
use App\Accounts\Data\Enums\AccountStatusEnum;
use App\Accounts\Data\Repositories\EditAccountRepository;
use Carbon\Carbon;
use Marcelofabianov\MicroServiceBuilder\Service\BaseService;
use ReflectionException;
use Throwable;

final class EditAccountService extends BaseService
{
    /**
     * @return array
     * @throws ReflectionException
     * @throws Throwable
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
            'updatedAt' => Carbon::now(),
            'createdAt' => Carbon::parse($this->dataUpdate['createdAt'])
        ];

        $data['status'] = AccountStatusEnum::from($this->dataUpdate['status']);

        if (isset($this->data['status'])) {
            $data['status'] = AccountStatusEnum::from($this->data['status']);
        }

        $account = AccountDto::from($data);

        $repository = new EditAccountRepository();

        return $repository->save($account, $this->id);
    }
}
