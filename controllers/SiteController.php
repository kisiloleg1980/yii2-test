<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\forms\RegForm;
use app\forms\LogForm;
use app\services\UsersService;
use yii\filters\AccessControl;


class SiteController extends Controller
{
    public $service;

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
                'rules' => [
                    [
                        'actions' => ['reg', 'log', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
        {
        return [
        'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        'captcha' => [
            'class' => 'yii\captcha\CaptchaAction',
            
        ],
        ];
    }
   
    public function actionReg()
    {
        $model=new RegForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
                $this->service->SaveNewUser($model);
                return $this->redirect(['/']);
        }

        return $this->render('RegFormView', ['model' => $model]);    
    }

    public function actionLog()
    {
        $model=new LogForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user=$this->service->GetUser($model);
            if (isset($user)) {
               Yii::$app->user->login($user);
               return $this->redirect(['/']);
            }
        }

        return $this->render('LogFormView', ['model' => $model]);    
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function __construct($id, $module, UsersService $service, $config = [])
    {
        parent::__construct($id, $module, $config); 
        $this->service = $service;
    }

    public function actionIndex(){
        return $this->render('index');
    }
}
