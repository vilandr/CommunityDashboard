<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\KPA;

class SiteController extends Controller
{
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

    public function actions()
    {
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

    public function actionIndex()
    {

        //Reference: http://www.yiiframework.com/doc-2.0/guide-db-active-record.html
        $kpas = KPA::find()
            ->all();

        return $this->render('index', [
                'kpas' => $kpas,
            ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    /* Controller actions for KPAs
        @todo: create seperate controller class
    */

    public function actionViewkpa($id) {

        $kpa = new KPA();

    }


    public function actionAddkpa()
    {
        $model = new KPA();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {

            if($model->save()) {
                Yii::$app->session->setFlash('kpaCreated', 'KPA has been saved');
            } else {
                Yii::$app->session->setFlash('kpaCreated','There was a problem saving this KPA');
            }

            return $this->render('addkpa', [
                'model'=>$model,
                'added'=>true,
                ]);

        }

        return $this->render("addkpa", [
                'model' => $model,
                'added' => false,
            ]);
    }
}
