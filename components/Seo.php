<?php


namespace app\components;

use Yii;
use yii\base\Component;

class Seo extends Component
{
    public function registerTitle($value)
    {
        Yii::$app->view->title = $value;
    }

    public function ViewLastPage($lastPage)
    {
       /* Yii::$app->request->getUrl();*/ //а в main.php путь url добавить компонент, взятый из массива сессии(last_key),
        // не знаю, туповат я.
    }
}