<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\services\ListUsersService;
use yii\filters\AccessControl;


class ListUsersController extends Controller
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
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
            $models=$this->service->GetListUsers('id');
            return $this->render('index', ['Models' => $models]);    
    }

    public function actionGet($field){
        $models=$this->service->GetListUsers($field);
        return $this->renderPartial('ajax', ['Models' => $models]);
    }

    

    public function __construct($id, $module, ListUsersService $service, $config = [])
    {
        parent::__construct($id, $module, $config); 
        $this->service = $service;
    }
}
