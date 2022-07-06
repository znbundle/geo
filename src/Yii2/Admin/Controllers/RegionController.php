<?php

namespace ZnBundle\Geo\Yii2\Admin\Controllers;

use ZnBundle\Geo\Domain\Entities\RegionEntity;
use ZnBundle\Geo\Domain\Interfaces\Services\RegionServiceInterface;
use ZnBundle\Geo\Yii2\Admin\Forms\RegionForm;
use ZnBundle\Geo\Yii2\Admin\Module;
use yii\helpers\Url;
use ZnLib\I18Next\Facades\I18Next;
use ZnLib\Web\TwBootstrap\Widgets\Breadcrumb\BreadcrumbWidget;
use ZnYii\Web\Controllers\BaseController;

class RegionController  extends BaseController
{
    protected $baseUri = '/geo/region';
    protected $formClass = RegionForm::class;
    protected $entityClass = RegionEntity::class;

    public function __construct(
        string $id,
        Module $module,
        BreadcrumbWidget $breadcrumbWidget,
        RegionServiceInterface $regionService,
        array $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $regionService;
        $this->breadcrumbWidget = $breadcrumbWidget;
        $this->breadcrumbWidget->add(I18Next::t('geo', 'region.title'), Url::to([$this->baseUri]));
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['restore'] = $this->getRestoreActionConfig();
        return $actions;
    }

}