<?php

namespace ZnBundle\Geo\Domain;

use ZnCore\Domain\Interfaces\DomainInterface;

class Domain implements DomainInterface
{

    public function getName()
    {
        return 'geo';
    }


}

