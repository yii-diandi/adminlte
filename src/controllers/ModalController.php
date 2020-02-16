<?php

namespace diandi\adminlte\controllers;

use Yii;
use  backend\controllers\BaseController;
use yii\web\Controller;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class ModalController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'website' => [
                'class' => \yii2mod\settings\actions\SettingsAction::class,
                'view' => 'website',
                // also you can use events as follows:
                'on beforeSave' => function ($event) {
                    // your custom code
                },
                'on afterSave' => function ($event) {
                    // your custom code
                },
                'modelClass' => \common\models\forms\Website::class,
            ],
        ];
    }

    public function actionIcons()
    {
        $ids = Yii::$app->request->get('inputClass');
        $modalClass = Yii::$app->request->get('modalClass');

        return $this->renderAjax('icons', ['ids' => $ids, 'modalClass' => $modalClass]);
    }
}
