<?php


namespace app\models;


use yii\base\Model;

class UserTask extends UploadFile
{
    public $idTask;
    public $title;
    public $description;
    public $editor;
    public $deadline;

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание задачи',
            'deadline' => 'Сроки выполнения'
        ];
    }

    public function rules()
    {
        return [
          [['title','description','editor'], 'required'],
          [['title'], 'string', 'min' => 5, 'max' => 25],
          [['description'], 'string', 'min' => 10, 'max' => 150]
        ];
    }
}