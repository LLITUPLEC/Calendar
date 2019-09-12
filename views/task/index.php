<?php

use app\models\UserTask;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var UserTask $model
 */
?>

<h1>Новая задача</h1>

<?php $form = ActiveForm::begin([
        'action' => '/task/add'
]) ?>

    <h4>Создайте задачу</h4>
    <?= $form->field($model, 'editor')->checkboxList(['Я','Editor', 'user 1', 'user 2'])->label('Ответственный за задачу?')->hint('можете выбрать более одного') ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'description')->textarea() ?>
    <!--  хотел добавить форму выбора даты, но не смог, не нашёл  --><?//= $form->field($model, 'deadline')-> ?>

    <?= Html::submitButton('Подтвердить',['class' => 'btn btn-success'])?>
    <?= Html::resetButton('Сбросить форму',['class' => 'btn reset'])?>


<?php ActiveForm::end() ?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
