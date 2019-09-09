<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $dayStart;
    public $dayEnd;
    public $userID;
    public $description;
    public $repeatTask; // добавил свойство, которое будет отвечать за повтор события
    public $onlyOneTask; // добавил свойство, которое будет блокировать остальные события в определённую дату
}