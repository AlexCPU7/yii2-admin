<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\instagram\models\Statistic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statistic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'followers')->textInput() ?>

    <?= $form->field($model, 'following')->textInput() ?>

    <?= $form->field($model, 'posts')->textInput() ?>

    <?= $form->field($model, 'datatime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
