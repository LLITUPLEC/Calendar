<?php


namespace app\controllers;

use Yii;
use app\models\UserTask;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        //показывает форму
        $model = new UserTask();

        return $this->render('index', compact('model'));
    }

    public function actionAdd()
    {
        //добавляет задачу (принимает данные)
        $model = new UserTask();

        $model->load(Yii::$app->request->post());

        if ($model->validate()) {
            return $this->redirect('/task/result');
        } else {
            return $this->redirect('/task/result');
        }
    }

    public function actionResult()
    {
        // результат добавления
        return "Спасибо, задача добавлена";
    }
}