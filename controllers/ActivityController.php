<?php


namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\web\Controller;

    class ActivityController extends Controller
    {
        public function actionIndex()
        {
            return Yii::$app->session->get('page', 'Not SET');

        }

        public function actionView()
        {

//            if (Yii::$app->session->has('onlyOneTask')) { // дичь наверно написал какую-то...это свойство модели, и если оно
//                // присутствует, то отсальные блокирует(не знаю)
//                Yii::$app->session->set('Warning', 'На выбранную дату уже есть важное событие');
//            }

            $activityItem = new Activity();
            $activityItem->title = 'New Activity Heading';
            return $this->render('view', [
                'model' => $activityItem
            ]);
        }

        public function actionCreate()
        {
            //dsadas
        }
    }