<?php

namespace diandi\adminlte;

use Yii;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\bootstrap\Modal;

class ModalHepler extends InputWidget
{
    public $clientOptions = [];
    public $chooseButtonClass = ['class' => 'btn-default'];
    private $_view;
    private $_hashVar;
    private $_encOptions;
    private $_hashInput;
    private $_config;
    public $options = [];

    public function init()
    {
        parent::init();
        $this->_view = $this->getView();
        $this->initOptions();
    }

    public function run()
    {
        if ($this->hasModel()) {
            $model = $this->model;
            $attribute = $this->attribute;
            $html = $this->renderInput($model, $attribute);
            $html .=  $this->showIcons();
            echo $html;
        }
    }

    public function showIcons()
    {

        return  $this->render('modal', ['modalClass' => $this->_hashVar, 'inputClass' => $this->_hashInput, 'modalUrl' => $this->options['url']]);
    }

    /**
     * init options
     */
    public function initOptions()
    {
        // to do.
        $id = md5($this->options['id']);
        $this->hashClientOptions("icons_{$id}");
    }

    /**
     * generate hash var by plugin options
     */
    protected function hashClientOptions($name)
    {
        $this->_encOptions = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
        $this->_hashVar = $name . '_' . hash('crc32', $this->_encOptions);
        $this->_hashInput = $name . '_' . Md5('crc32', $this->_encOptions);
    }


    /**
     * render html body-input
     */
    public function renderInput($model, $attribute)
    {
        Html::addCssClass($this->chooseButtonClass, "btn {$this->_hashVar}");
        $eles = [];

        $eles[] = Html::activeTextInput($model, $attribute, ['class' => "form-control {$this->_hashInput}"]);

        $eles[] = Html::tag('span', Html::button($this->options['label'], [
            'class' => 'btn-default btn',
            'data-toggle' => 'modal',
            'data-target' => "#{$this->_hashVar}"
        ]), [
            'class' => 'input-group-btn'
        ]);

        return Html::tag('div', implode("\n", $eles), ['class' => 'input-group']);
    }
}
