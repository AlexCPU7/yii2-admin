<?php

namespace app\controllers;

use yii\filters\AccessControl;
use app\controllers\AppController;

class InstController extends AppController
{
    public function actionIndex(){
        return $this->render('index');
    }

}
