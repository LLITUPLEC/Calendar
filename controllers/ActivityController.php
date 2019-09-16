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
        $db = Yii::$app->db;

        $rows = $db->createCommand('SELECT * FROM activities')->queryAll();

        return $this->render('index', [
            'activities' => $rows
        ]);
    }

    /**
     * Просмотр выбранного события
     * @param $id
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionView($id)
    {

        $db = Yii::$app->db;

        $model = $db->createCommand('SELECT * FROM activities WHERE id=:id',[
            ':id' => $id,
        ])->queryOne();

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