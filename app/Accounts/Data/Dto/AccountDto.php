<?php

namespace App\Accounts\Data\Dto;

use App\Accounts\Data\Enums\AccountStatusEnum;
use Marcelofabianov\MicroServiceBuilder\Data\Dto\DtoContract;
use Carbon\Carbon;
use Dgame\DataTransferObject\DataTransfer;

final class AccountDto implements DtoContract
{
    use DataTransfer;

    /**
     * @var Carbon
     */
    public Carbon $createdAt;

    /**
     * @var Carbon
     */
    public Carbon $updatedAt;

    /**
     * @var string
     */
    public string $document;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var AccountStatusEnum
     */
    public AccountStatusEnum $status;

    /**
     * @var string|null
     */
    public ?string $email;

    /**
     * @var string|null
     */
    public ?string $phone;

    /**
     * @var string|null
     */
    public ?string $address;

    /**
     * @var string|null
     */
    public ?string $addressNumber;

    /**
     * @var string|null
     */
    public ?string $addressComplement;
}
