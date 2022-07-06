<?php

namespace ZnBundle\Geo\Domain\Services;

use ZnBundle\Geo\Domain\Interfaces\Services\CurrencyServiceInterface;
use ZnCore\EntityManager\Interfaces\EntityManagerInterface;
use ZnBundle\Geo\Domain\Interfaces\Repositories\CurrencyRepositoryInterface;
use ZnCore\Domain\Service\Base\BaseCrudService;
use ZnBundle\Geo\Domain\Entities\CurrencyEntity;

/**
 * @method
 * CurrencyRepositoryInterface getRepository()
 */
class CurrencyService extends BaseCrudService implements CurrencyServiceInterface
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass() : string
    {
        return CurrencyEntity::class;
    }
}
