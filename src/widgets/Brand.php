<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Brand extends Widget
{
    public $logo    = false;
    public $title   = false;
    public $auto    = true;
    public $img    = false;
    public $options;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        
        $brand =  ($this->title) ? Html::encode(Yii::$app->setting->getValue('app::title')):"";
        if($this->auto && isset($this->img['name'])){
            $brand = Html::img(Yii::$app->request->baseUrl.'/'. Yii::$app->setting->getValue('storage::path') .'/'.strval($this->img['name']), $this->options);
        }else{
            $brand = (isset($this->img['name']) && $this->logo) ? Html::img(Yii::$app->request->baseUrl.'/'. Yii::$app->setting->getValue('storage::path') .'/'.strval($this->img['name']), $this->options):"";
            $brand .=  ($this->title) ? Html::encode(Yii::$app->setting->getValue('app::title')):"";
        }
        return $brand;
    }
}
