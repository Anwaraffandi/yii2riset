<?php

namespace app\Controllers;

//use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\models\Akun;

use app\models\User;

class AccessController extends Controller
{
    public function behaviors(){
         return [
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'actions'=>[
                            'index',
                            'add',
                            'detail',
                            'edit',
                            'delete',
                            'view'
                        ],
                        'allow'=>true,
                        'roles' => ['@'],
                        'matchCallback'=>function(){
//                            return User::isUserAdmin(Yii::$app->user->identity->username);
                            return (
                                Yii::$app->user->identity->role=='admin'
                            );
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
     }
}

