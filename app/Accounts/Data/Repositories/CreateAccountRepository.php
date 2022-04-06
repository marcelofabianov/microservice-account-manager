<?php

namespace App\Accounts\Data\Repositories;

use App\Accounts\Data\DtoTranslate\AccountDtoTranslate;
use Marcelofabianov\MicroServiceBuilder\Data\Dto\DtoContract;
use Marcelofabianov\MicroServiceBuilder\Data\Repository\BaseRepository;
use Marcelofabianov\MicroServiceBuilder\Data\Repository\SaveRepositoryContract;

final class CreateAccountRepository extends BaseRepository implements SaveRepositoryContract
{
    /**
     * Define Translate
     */
    protected function init()
    {
        $this->translate = AccountDtoTranslate::instance();
    }

    /**
     * @param DtoContract $dto
     * @param int|null $id
     * @return array|null
     */
    public function save(DtoContract $dto, int $id = null): array|null
    {
        $data = $this->translate->translateDtoFromSource($dto);

        if ($id = $this->insertGetId($data)) {
            return (array) $this->find($id);
        }

        return null;
    }
}
