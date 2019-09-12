<?php


namespace app\models;


use Yii;
use yii\base\Model;

class Day extends Model
{
    public $dayOff = false; // false - рабочий день, true - выходной
    public $activities = [

    ];
}