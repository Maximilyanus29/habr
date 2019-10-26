<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Searchcomments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'h1') ?>

    <?= $form->field($model, 'pageText') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'in_category') ?>

    <?php // echo $form->field($model, 'owned_by_user') ?>

    <?php // echo $form->field($model, 'count_view') ?>

    <?php // echo $form->field($model, 'count_bookmarked') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
