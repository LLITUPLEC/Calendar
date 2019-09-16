<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $date_start;
    public $date_end;
    public $user_id;
    public $description;
    public $repeat = false; // добавил свойство, которое будет отвечать за повтор события
    public $blocked = true; // добавил свойство, которое будет блокировать остальные события в определённую дату
    public $attachments;
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание задачи',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'attachments' => 'Прикреплённые файлы',
            'repeat' => 'Повтор',
            'blocked' => 'Блокирующее',
            'user_id' => 'Пользователь',
        ];
    }
    public function rules()
    {
        return [
            [['title','description','user_id'], 'required'],
            [['title'], 'string', 'min' => 5, 'max' => 25],
            [['description'], 'string', 'min' => 10, 'max' => 150],
            [['date_start', 'date_end'], 'date', 'format' => 'php:Y-m-d'],
            [['attachments'], 'file', 'maxFiles' => 10],
            [['repeat', 'blocked'], 'boolean'],
            [['user_id'], 'integer']
        ];
    }
}