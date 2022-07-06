<?php

namespace ZnBundle\Geo\Domain\Services;

use ZnBundle\Geo\Domain\Entities\CountryEntity;
use ZnBundle\Geo\Domain\Interfaces\Services\CountryServiceInterface;
use ZnCore\Service\Base\BaseCrudService;
use ZnCore\EntityManager\Interfaces\EntityManagerInterface;
use ZnCore\Query\Entities\Query;

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
            $this->currentCountry = $this->findOneById($_ENV['COUNTRY_ID']);
        }
        return $this->currentCountry;
    }
}
