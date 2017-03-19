<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'utype') ?>

    <?= $form->field($model, 'pay_type') ?>

    <?= $form->field($model, 'is_paid') ?>

    <?php // echo $form->field($model, 'oid') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'payment_name') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'payment_time') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'setmeal') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'week') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>