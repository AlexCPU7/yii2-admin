<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
?>

<div class="statistic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Назад'), ['/instagram'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Добавить новый аккаунт'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'account',
            'posts',
            'followers',
            'following',
            'datatime:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>