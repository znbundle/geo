<?php

namespace ZnBundle\Geo\Domain\Repositories\Eloquent;

use ZnCore\Base\Libs\I18Next\Mappers\I18nMapper;
use ZnCore\Contract\Mapper\Interfaces\MapperInterface;
use ZnLib\Db\Base\BaseEloquentCrudRepository;
use ZnBundle\Geo\Domain\Entities\LocalityEntity;
use ZnBundle\Geo\Domain\Interfaces\Repositories\LocalityRepositoryInterface;

class LocalityRepository extends BaseEloquentCrudRepository implements LocalityRepositoryInterface
{

    public function tableName() : string
    {
        return 'geo_locality';
    }

    public function getEntityClass() : string
    {
        return LocalityEntity::class;
    }

    public function mapper(): MapperInterface
    {
        return new I18nMapper($this->getEntityClass(), ['name_i18n']);
    }

}

