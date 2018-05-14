<?php

namespace app\modules\instagram\controllers;

use Yii;
use app\modules\instagram\models\UserAccounts;
use app\modules\instagram\models\UserAccountsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\instagram\component\Parser;
use app\modules\instagram\models\Statistic;
use app\modules\instagram\models\StatisticSearch;

/**
 * UserAccountsController implements the CRUD actions for UserAccounts model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserAccounts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserAccountsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new UserAccounts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserAccounts();

        if (Yii::$app->request->post() && $account = Yii::$app->request->post()['UserAccounts']['account']){

            $parse = new Parser;

            $info = $parse->refreshAccount($account);

            $model->user_id = Yii::$app->user->id;
            $model->account = $account;
            $model->avatar = $info['avatar'];
            $model->name = 'name';//$info['name'];
            $model->descr = 'descr';//$info['descr'];
            $model->followers = $info['followers'];
            $model->following = $info['following'];
            $model->posts = $info['posts'];
            $model->datatime = time();

            if ($model->validate()){
                $model->save();
                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserAccounts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserAccounts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserAccounts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserAccounts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserAccounts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionStatistic($account){

        $model = Statistic::find()->where(['user_id' => Yii::$app->user->id])->andWhere(['account' => $account])->orderBy(['datatime' => SORT_DESC ])->all();
        $account = UserAccounts::find()->where(['account' => $account])->one();

        //$searchModel = new StatisticSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams, $account);

        return $this->render('statistic', [
            'model' => $model,
            'account' => $account
        ]);
    }
}
