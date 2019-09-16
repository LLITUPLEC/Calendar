<?php
namespace app\controllers;
use app\models\Activity;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;
class ActivityController extends Controller
{
    /**
     * Просмотр всех событий
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * Просмотр выбранного события
     * @return string
     */
    public function actionView()
    {
        $model = new Activity([
            'title' => 'Событие №1',
            'description' => 'Небольшое описание',
            'date_start' => '2019-09-12',
            'date_end' => '2019-09-13',
            'blocked' => true,
            'repeat' => false,
            'user_id' => 1,
        ]);
        return $this->render(
            'view',
            compact('model')
        );
    }
    /**
     * Создание нового события
     * @return string
     */
    public function actionCreate()
    {
        $model = new Activity();
        return $this->render(
            'create',
            compact('model')
        );
    }
    /**
     * Удаление выбранного события
     * @return string
     */
    public function actionDelete()
    {
        return 'Activity@delete';
    }
    /**
     * Тестовый метод для показа данных формы
     * @return string
     */
    public function actionSubmit()
    {
        $model = new Activity();
        if ($model->load(Yii::$app->request->post())) {
            $model->attachments = UploadedFile::getInstances($model, 'attachments');
            if ($model->validate()) {
                return "Success: " . VarDumper::export($model->attributes);
            } else {
                return "Failed: " . VarDumper::export($model->errors);
            }
        }
        return 'Activity@Submit';
    }
}