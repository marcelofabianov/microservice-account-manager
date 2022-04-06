<?php

namespace App\Accounts\Data\DtoTranslate;

use App\Accounts\Data\Dto\AccountDto;
use App\Accounts\Data\Enums\AccountStatusEnum;
use Marcelofabianov\MicroServiceBuilder\Data\DtoTranslate\BaseDtoTranslate;
use Marcelofabianov\MicroServiceBuilder\Data\DtoTranslate\DtoTranslateContract;
use Marcelofabianov\MicroServiceBuilder\Data\Dto\DtoContract;
use Carbon\Carbon;
use ReflectionException;
use Throwable;

final class AccountDtoTranslate extends BaseDtoTranslate implements DtoTranslateContract
{
    /**
    * @return string
    */
    public function table(): string
    {
        return 'tb_contas';
    }

    /**
     * @return array
     */
    public function definingMapping(): array
    {
        return [
            'id' => 'conta_id',
            'createdAt' => 'data_insercao',
            'updatedAt' => 'data_manutencao',
            'document' => 'conta_cnpj',
            'name' => 'conta_razao_social',
            'email' => 'conta_email',
            'phone' => 'conta_telefone',
            'status' => 'conta_status',
            'address' => 'conta_logradouro',
            'addressNumber' => 'conta_logradouro_numero',
            'addressComplement' => 'conta_logradouro_complemento',
        ];
    }

    /**
     * @throws ReflectionException
     * @throws Throwable
     */
    public function translateSourceFromDto(array $source): DtoContract
    {
        $dataDto =  [];

        foreach ($source as $key => $value) {
            $dataDto[$this->getAttributeDto($key)] = $value;
        }

        $dataDto['createdAt'] = Carbon::parse($dataDto['createdAt']);
        $dataDto['updatedAt'] = Carbon::parse($dataDto['updatedAt']);
        $dataDto['status'] = AccountStatusEnum::from($dataDto['status']);

        $dto = AccountDto::from($dataDto);
        $dto->id = $dataDto['id'];

        return $dto;
    }
}
