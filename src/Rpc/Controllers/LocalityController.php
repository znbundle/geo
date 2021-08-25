<?php

namespace ZnBundle\Geo\Rpc\Controllers;

use ZnLib\Rpc\Rpc\Base\BaseCrudRpcController;
use ZnBundle\Geo\Domain\Interfaces\Services\LocalityServiceInterface;

class LocalityController extends BaseCrudRpcController
{

    public function __construct(LocalityServiceInterface $service)
    {
        $this->service = $service;
    }
}
