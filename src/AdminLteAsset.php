<?php

/**
 * @Author: Wang Chunsheng 2192138785@qq.com
 * @Date:   2020-02-29 16:57:33
 * @Last Modified by:   Wang Chunsheng 2192138785@qq.com
 * @Last Modified time: 2020-03-30 19:39:34
 */


namespace diandi\adminlte;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle.
 *
 * @since 0.1
 */
class AdminLteAsset extends BaseAdminLteAsset
{
    public $sourcePath = '@vendor/yii-diandi/adminlte/asset/';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        'dist/css/font-awesome.min.css',
        'dist/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/all-skins.min.css',
    ];
    public $js = [
        // 'plugins/jQuery/jquery-2.2.3.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.js',
        'dist/js/app.js',
        'dist/js/demo.js',
        'dist/js/app_iframe.js',
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',
        // 'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     *
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = 'all-skins';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        // Append skin color file if specified
        if ($this->skin) {
            if (('all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }
            $this->css[] = sprintf('dist/css/skins/%s.min.css', trim($this->skin));
        }

        parent::init();
    }
}
