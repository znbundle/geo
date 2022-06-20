<?php

namespace ZnBundle\Geo\Domain\Services;

use ZnBundle\Geo\Domain\Entities\CountryEntity;
use ZnBundle\Geo\Domain\Interfaces\Services\CountryServiceInterface;
use ZnCore\Domain\Base\BaseCrudService;
use ZnCore\Base\Libs\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\Base\Libs\Query\Entities\Query;

/**
 * @method
 * CountryRepositoryInterface getRepository()
 */
class CountryService extends BaseCrudService implements CountryServiceInterface
{
    private $currentCountry;

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass() : string
    {
        return CountryEntity::class;
    }

    public function getCurrentCountry(): CountryEntity
    {
        if(!isset($this->currentCountry)) {
            $this->currentCountry = $this->oneById($_ENV['COUNTRY_ID']);
        }
        return $this->currentCountry;
    }
}
