<?php

namespace ZnBundle\Geo\Yii2\Admin\Controllers;

use ZnBundle\Geo\Domain\Entities\LocalityEntity;
use ZnBundle\Geo\Domain\Interfaces\Services\LocalityServiceInterface;
use ZnBundle\Geo\Yii2\Admin\Forms\LocalityForm;
use ZnBundle\Geo\Yii2\Admin\Module;
use Yii;
use yii\helpers\Url;
use ZnLib\Components\I18Next\Facades\I18Next;
use ZnLib\Web\Components\TwBootstrap\Widgets\Breadcrumb\BreadcrumbWidget;
use ZnYii\Web\Controllers\BaseController;

class LocalityController extends BaseController
{
    protected $baseUri = '/geo/locality';
    protected $formClass = LocalityForm::class;
    protected $entityClass = LocalityEntity::class;

    public function __construct(
        string $id,
        Module $module,
        BreadcrumbWidget $breadcrumbWidget,
        LocalityServiceInterface $localityService,
        array $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $localityService;
        $this->breadcrumbWidget = $breadcrumbWidget;
        $this->breadcrumbWidget->add(I18Next::t('geo', 'locality.title'), Url::to([$this->baseUri]));
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['restore'] = $this->getRestoreActionConfig();
        $successRedirectUrl = [$this->baseUri, 'region_id' => Yii::$app->request->get('region_id')];
        $actions['create']['successRedirectUrl'] = $successRedirectUrl;
        $actions['update']['successRedirectUrl'] = $successRedirectUrl;
        $actions['delete']['successRedirectUrl'] = $successRedirectUrl;
        return $actions;
    }

}