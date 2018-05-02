<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\instagram\models\UserAccounts */

$this->title = Yii::t('app', 'Create User Accounts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-accounts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
