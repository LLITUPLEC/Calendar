<?php

/**
 * @var $this yii\web\View
 * @var $provider ActiveDataProvider
 */

use app\models\Activity;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

$columns = [
    //[
    //    'class' => SerialColumn::class,
    //    'header' => 'Псевдо-порядковый номер',
    //],
    //[
    //    // activity.id - пример перезаписи названия столбца
    //    'label' => 'Порядковый номер',
    //    'attribute' => 'id',
    //],
    [
        // activity.id - пример перезаписи значения
        'label' => 'Порядковый номер',
        'value' => function (Activity $model) {
            return "# {$model->id}";
        },
    ],
    //'id',
    'title',
    'date_start:datetime',
    //'user_id',
    [
        'label' => 'Имя создателя',
        'attribute' => 'user_id', // авто-подключение зависимостей
        'value' => function (Activity $model) {
            return $model->user->username;
        }
        // $model->user->username
    ],
    'repeat:boolean', // Yii::$app->formatter->asBoolean(...)
    'blocked:boolean',
    'created_at:date',
];

if (Yii::$app->user->can('user')) {
    $columns[] = [
        'class' => ActionColumn::class,
        'header' => 'Операции',
    ];
}

?>

    <div class="row">
        <h1>Список событий</h1>

        <div class="form-group pull-right">
            <?= Html::a('Создать', ['activity/update'], ['class' => 'btn btn-success pull-right']) ?>
        </div>
    </div>

<?= GridView::widget([
    'dataProvider' => $provider, // $provider->getModels() [....]
    'columns' => $columns,
]) ?>