<?php
/**
 * @Author: Wang chunsheng
 * @Date:   2020-04-29 02:27:17
 * @Last Modified by:   Wang chunsheng  email:2192138785@qq.com
 * @Last Modified time: 2020-05-10 14:06:08
 */

namespace diandi\adminlte\widgets;

use yii\base\Widget;

class icon extends Widget
{
    public $options = [];

    public $model;

    public $attribute;

    public $theme = 'icon';

    public $items;

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render($this->theme, [
            'items' => $this->items,
            'model' => $this->model,
            'attribute' => $this->attribute,
        ]);
    }
}
