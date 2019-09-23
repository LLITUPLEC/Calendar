<?php

namespace app\controllers;

use app\models\Activity;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class ActivityController extends Controller
{
    /**
     * Настройка поведений контроллера (ACF доступы)
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'update', 'delete', 'submit'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Просмотр всех событий
     * @return string
     */
    public function actionIndex()
    {
        // TODO: получение всех событий через pagination (GridView)

        $query = Activity::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'validatePage' => false,
            ],
        ]);

        return $this->render('index', [
            'provider' => $provider,
        ]);
    }

    /**
     * Просмотр выбранного события
     *
     * @param int $id
     *
     * @return string
     */
    public function actionView(int $id)
    {
        // TODO: просмотр события по GET $id (DetailView)

        $item = Activity::findOne($id);

        return $this->render('view', [
            'model' => $item,
        ]);
    }

    /**
     * Создание нового события
     *
     * @param int|null $id
     *
     * @return string
     */
    public function actionUpdate(int $id = null)
    {
        // TODO: показ ошибки 404, если нет такой статьи или нет прав на редактирование

        $item = $id ? Activity::findOne($id) : new Activity();

        return $this->render('edit', [
            'model' => $item,
        ]);
    }

    /**
     * Удаление выбранного события
     *
     * @param int $id
     *
     * @return string
     */
    public function actionDelete(int $id)
    {
        // TODO: удаление записи по $id + flash Alert, или показ ошибки, если нет прав на редактирование

        Activity::deleteAll(['id' => $id]);

        return $this->redirect(['activity/index']);
    }

    public function actionSubmit()
    {
        // TODO: сохранение или обновление записей из POST + flash Alert + redirect (проверка доступа)

        $form = new Activity();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            if ($form->save()) {
                return $this->redirect(['activity/view', 'id' => $form->id]);
            }
        }

        return $this->goBack();
    }
}
