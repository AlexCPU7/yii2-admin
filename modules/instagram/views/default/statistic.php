<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<div class="statistic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Назад'), ['/instagram'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Добавить новый аккаунт'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::end(); ?>


    <div class="inst-user-account">
        <?= var_dump($account->account) ?>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Дата</td>
                <td>Подписчики</td>
                <td>Разница</td>
                <td>Посты</td>
                <td>Разница</td>
                <td>Подписки</td>
                <td>Разница</td>
            </tr>
        </thead>
        <tbody>
        <?php $chekFollowers = 0 ?>
        <?php $chekPosts = 0 ?>
        <?php $chekFollowing = 0 ?>
            <?php foreach ($model as $i => $item){ ?>
                <tr>
                    <?php if ($i !== 0){ ?>

                        <td><?= $i ?></td>

                        <td><?= date("d-m-Y", $model[$i-1]->datatime); ?></td>

                        <td><?= $model[$i-1]->followers ?></td>

                        <?php $j = $chekFollowers - $item->followers; ?>
                        <?php if ($j > 0){ ?>
                            <td style="color:green">+<?= $j ?></td>
                        <?php }elseif($j < 0){ ?>
                            <td style="color:red"><?= $j ?></td>
                        <?php }else{ ?>
                            <td><?= $j ?></td>
                         <?php } ?>

                        <td><?= $model[$i-1]->posts ?></td>

                        <?php $j = $chekPosts - $item->posts; ?>
                        <?php if ($j > 0){ ?>
                            <td style="color:green">+<?= $j ?></td>
                        <?php }elseif($j < 0){ ?>
                            <td style="color:red"><?= $j ?></td>
                        <?php }else{ ?>
                            <td style="color:red" ><?= $j ?></td>
                        <?php } ?>

                        <td><?= $model[$i-1]->following ?></td>

                        <?php $j = $chekFollowing - $item->following; ?>
                        <?php if ($j > 0){ ?>
                            <td style="color:red">+<?= $j ?></td>
                        <?php }elseif($j < 0){ ?>
                            <td style="color:green"><?= $j ?></td>
                        <?php }else{ ?>
                            <td><?= $j ?></td>
                        <?php } ?>
                    <?php } ?>
                </tr>
                <?php $chekFollowers = $item->followers ?>
                <?php $chekPosts = $item->posts ?>
                <?php $chekFollowing = $item->following ?>
            <?php } ?>
        </tbody>
    </table>

</div>