<?php
/**
 * @var $this yii\web\View
 * @var array $activities
 */
use yii\helpers\Html;
?>

<div class="row">
    <h1>Список событий</h1>

    <div class="form-group pull-right">
        <?= Html::a('Создать', ['activity/create'], ['class' => 'btn btn-success pull-right']) ?>
    </div>
</div>
<ul>
    <?php foreach ($activities as $item) { ?>
        <li>
            <pre>
            <?= var_dump($item); ?>
            </pre>
        </li>
    <?php } ?>
</ul>