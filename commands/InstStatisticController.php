<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\modules\instagram\models\Statistic;
use app\modules\instagram\component\Parser;
use app\modules\instagram\models\UserAccounts;

class InstStatisticController extends Controller
{
    public function actionIndex(){

        $accounts = UserAccounts::find()->select(['user_id', 'account'])->all();

        foreach ($accounts as $account){

            $model = new Statistic();

            $parse = new Parser;

            $arr = $parse->refreshAccount($account->account);

            $model->user_id = $account->user_id;
            $model->account = $account->account;
            $model->followers = $arr['followers'];
            $model->following = $arr['following'];
            $model->posts = $arr['posts'];
            $model->datatime = time();

            $model->save();

        }


    }
}
