<?php
/***
 * @开源软件: 店滴AI-基于AI的软硬件开源解决方案
 * @官方地址: http://www.wayfirer.com/
 * @版本: 1.0
 * @邮箱: 2192138785@qq.com
 * @作者: Wang Chunsheng
 * @Date: 2020-03-29 02:08:38
 * @LastEditTime: 2020-04-25 08:57:54
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
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
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
