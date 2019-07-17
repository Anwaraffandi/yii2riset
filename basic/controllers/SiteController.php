<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;
use yii\data\Pagination;

use app\models\Post;
use app\models\Akun;
use app\models\Komen;
//use app\models\User;

class SiteController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions(){

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){
    $komen = new Komen();
    $query = Post::find();

    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>2]);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

    $post = $query->orderBy('idpost')->all();
    //echo "<pre>";print_r($dataProvider);die();
        return $this->render('index', ['post'=>$post, 'model'=>$komen, 'pages'=>$pages]);
    }

    public function actionKomen(){
        $komen = new Komen();
        if($komen->load(Yii::$app->request->post())){
            $komen->idkomen = NULL;
            $komen->username = Yii::$app->user->identity->username;
            $komen->save();
           // echo "<pre>";print_r($komen);die();
            return $this->redirect(Url::to(['site/index']));
        }
    }

    public function actionLogin(){

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout(){

        Yii::$app->user->logout();

        return $this->goHome();
    }


}
