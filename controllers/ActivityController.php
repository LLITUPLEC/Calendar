<?php


namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\web\Controller;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

    class ActivityController extends Controller
    {
        public function actionIndex()
        {
            return $this->render('index');

        }

        public function actionView()
        {
            $model = new Activity([
                'title' => 'Событие №1',
                'description' => 'Событие №1',
                'date_start' => 2019-11-11,
                'date_end' => 2019-12-12,
                'blocked' => true,
                'repeat' => false,
                'user_id' => 1,
            ]);

            return $this->render('view', compact('model'));
        }

        public function actionCreate()
        {
            $model = new Activity();

            return $this->render('create', compact('model'));
        }

        public function actionsSubmit()
        {
            $model = new Activity();

            if ($model->load(Yii::$app->request->post())) {
                $model->attachments = UploadedFile::getInstances($model, 'attachments');

                if ($model->validate()) {
                    return "Success: " . VarDumper::export($model->attributes);
                }   else {
                    return "Failed: " . VarDumper::export($model->errors);
                }
            }

            return 'Activity@Submit';
        }
    }