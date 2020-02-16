<?php

namespace diandi\adminlte;

use yii;

/**
 * plugins module definition class
 */
class Module extends  \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'diandi\adminlte\controllers';
    public $defaultRoute = 'default';
    public $_addonName;
    /**
     * 自动运行
     */
    public function init()
    {
        // 继承
        parent::init();
    }
}
