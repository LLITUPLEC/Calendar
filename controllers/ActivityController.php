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
            $activityItem = new Activity();
            $activityItem->title = 'New Activity Heading';
            return $this->render('view', [
                'model' => $activityItem
            ]);
        }

        public function actionCreate()
        {

        }
    }