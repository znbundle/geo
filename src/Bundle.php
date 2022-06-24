<?php

namespace ZnBundle\Geo;

use ZnCore\Base\Bundle\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function symfonyRpc(): array
    {
        return [
            __DIR__ . '/Rpc/config/country-routes.php',
            __DIR__ . '/Rpc/config/currency-routes.php',
            __DIR__ . '/Rpc/config/locality-routes.php',
            __DIR__ . '/Rpc/config/region-routes.php',
        ];
    }

    public function yiiWeb(): array
    {
        return [
            'modules' => [
                'geo' => __NAMESPACE__ . '\Yii2\Web\Module',
            ],
        ];
    }

    public function yiiAdmin(): array
    {
        return [
            'modules' => [
                'geo' => __NAMESPACE__ . '\Yii2\Admin\Module',
            ],
        ];
    }

    public function i18next(): array
    {
        return [
            'geo' => 'Packages/Geo/Domain/i18next/__lng__/__ns__.json',
        ];
    }

    public function migration(): array
    {
        return [
            '/vendor/znbundle/geo/src/Domain/Migrations',
        ];
    }

    public function container(): array
    {
        return [
            __DIR__ . '/Domain/config/container.php',
        ];
    }
    
    public function rbac(): array
    {
        return [
            __DIR__ . '/Domain/config/rbac.php',
        ];
    }
}
