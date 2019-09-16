<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\Activity
 */
use yii\helpers\Html;
?>
<div class="row">
    <h1>Просмотр события</h1>

    <div class="form-group pull-right">
        <?= Html::a('Назад', ['activity/index'], ['class' => 'btn btn-info']) ?>
    </div>
</div>

<h2><?= Html::encode($model->title) ?></h2>

<p><?= Html::encode($model->description) ?></p>

<ul>
    <li><strong>Пользователь: </strong><?= $model->user_id ?></li>
    <li><strong>Повтор: </strong><?= $model->repeat ?></li>
    <li><strong>Блокирующее: </strong><?= $model->blocked ?></li>
    <li><strong>Начало: </strong><?= $model->date_start ?></li>
    <li><strong>Окончание: </strong><?= $model->date_end ?></li>
</ul>