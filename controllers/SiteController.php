<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\KPA;
use app\models\Goal;
use app\models\KPI;
use app\models\Metrics;

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
                'kpas' =>$kpas,
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
    public function actionViewkpa($id)
    {

        $kpa = KPA::findOne($id);
        $goals = Goal::find()
        ->where(['kpa_id'=>$id])
        ->all();


        return $this->render('viewkpa', [
            'kpa'=>$kpa,
            'goals'=>$goals,
            ]);
    }

    public function actionViewgoal($id)
    {

        $goal = Goal::findOne($id);
        $kpis = KPI::find()
        ->where(['goal_id'=>$id])
        ->all();
        $kpa = KPA::findOne($goal->KPA_ID);

        return $this->render('viewgoal', [
            'goal'=>$goal,
            'kpis'=>$kpis,
            'kpa'=>$kpa,
            ]);
    }

    public function actionViewkpi($id)
    {


        $kpi = KPI::findOne($id);
        $metrics = Metrics::find()
        ->where(['kpi_id'=>$id])
        ->all();
        $goal = Goal::findOne($kpi->Goal_ID);
        $kpa = KPA::findOne($goal->KPA_ID);

        return $this->render('viewkpi', [
            'kpi'=>$kpi,
            'metrics'=>$metrics,
            'goal'=>$goal,
            'kpa'=>$kpa,
            ]);
    }

    public function actionViewmetric($id)
    {


        $metric = Metrics::findOne($id);
        $kpi = KPI::findOne($metric->KPI_ID);
        $goal = Goal::findOne($kpi->Goal_ID);
        $kpa = KPA::findOne($goal->KPA_ID);


        return $this->render('viewmetric', [
            'metric'=>$metric,
            'kpi'=>$kpi,
            'goal'=>$goal,
            'kpa'=>$kpa,
            ]);
    }


    public function actionAddkpa()
    {
        $model = new KPA();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {

            //@todo: add user id
            $model->User_ID = Yii::$app->user->identity->ID;

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

    public function actionAddgoal($kpa_id)
    {
        $model = new Goal();

        $model->KPA_ID=$kpa_id;

        //$kpa = KPA::find()
          //  ->where(['id'=>$kpa_id]);

        if($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->User_ID = Yii::$app->user->identity->ID;

            if($model->save()) {
                Yii::$app->session->setFlash('goalCreated', 'Goal has been saved');
            } else {
                Yii::$app->session->setFlash('goalCreated', 'There was a problem saving this goal');
            }
            return $this->render('addgoal', [
                'model'=>$model,
                'added'=>true,
                //'kpa'=>$kpa,
                ]);
        }
            return $this->render("addgoal", [
                'model' => $model,
                'added' => false,
                //'kpa' => $kpa,
                ]);

    }

    public function actionAddkpi($goal_id)
    {
        $model = new KPI();

        $model->Goal_ID=$goal_id;

        if($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->User_ID = Yii::$app->user->identity->ID;

            if($model->save()) {
                Yii::$app->session->setFlash('kpiCreated', 'KPI has been saved');
            } else {
                Yii::$app->session->setFlash('kpiCreated', 'There was a problem saving this KPI');
            }

            return $this->render('addkpi', [
                'model'=>$model,
                'added'=>true,
                ]);
        }
            return $this->render('addkpi', [
                'model' => $model,
                'added' => false,
                ]);

    }
    public function actionAddmetric($kpi_id)
    {
        $model = new Metrics();

        $model->KPI_ID=$kpi_id;

        if($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->User_ID = Yii::$app->user->identity->ID;

            if($model->save()) {
                Yii::$app->session->setFlash('metricCreated', 'Metric has been saved');
            } else {
                Yii::$app->session->setFlash('metricCreated', 'There was a problem saving this Metric');
            }

            return $this->render('addmetric', [
                'model'=>$model,
                'added'=>true,
                ]);
        }
            return $this->render('addmetric', [
                'model' => $model,
                'added' => false,
                ]);

    }
    public function actionEditkpa($id)
    {
        $kpa = KPA::findOne($id);

        if($kpa->load(Yii::$app->request->post()) && $kpa->validate()) {

            if($kpa->save()) {
                Yii::$app->session->setFlash('kpaUpdated', 'KPA has been saved');
            } else {
                Yii::$app->session->setFlash('kpaUpdated','There was a problem saving this KPA');
            }

        } else {
            //validation failed
        }

        return $this->render('editkpa', [
            'kpa' => $kpa,
        ]);
    }

    public function actionEditgoal($id)
    {
        $goal = Goal::findOne($id);
        $kpa = KPA::findOne($goal->KPA_ID);

        if($goal->load(Yii::$app->request->post()) && $goal->validate()) {


            if($goal->save()) {
                Yii::$app->session->setFlash('goalUpdated', 'Goal has been saved');
            } else {
                Yii::$app->session->setFlash('goalUpdated','There was a problem saving this Goal');
            }

        } else {
            //validation failed
        }

        return $this->render('editgoal', [
            'goal' => $goal,
            'kpa' => $kpa,
        ]);
    }
    public function actionEditkpi($id)
    {
        $kpi = KPI::findOne($id);
        $goal = Goal::findOne($kpi->Goal_ID);
        $kpa = KPA::findOne($goal->KPA_ID);

        if($kpi->load(Yii::$app->request->post()) && $kpi->validate()) {

            if($kpi->save()) {
                Yii::$app->session->setFlash('kpiUpdated', 'KPI has been saved');
            } else {
                Yii::$app->session->setFlash('kpiUpdated','There was a problem saving this KPI');
            }

        } else {
            //validation failed
        }

        return $this->render('editkpi', [
            'kpi' => $kpi,
            'goal' => $goal,
            'kpa' => $kpa,
        ]);
    }

    public function actionEditmetric($id)
    {
        $metric = Metrics::findOne($id);
        $kpi = KPI::findOne($metric->KPI_ID);
        $goal = Goal::findOne($kpi->Goal_ID);
        $kpa = KPA::findOne($goal->KPA_ID);

        if($metric->load(Yii::$app->request->post()) && $metric->validate()) {

            if($metric->save()) {
                Yii::$app->session->setFlash('metricUpdated', 'Metric has been saved');
            } else {
                Yii::$app->session->setFlash('metricUpdated','There was a problem saving this Metric');
            }

        } else {
            //validation failed
        }

        return $this->render('editmetric', [
            'metric' => $metric,
            'kpi' => $kpi,
            'goal' => $goal,
            'kpa' => $kpa,
        ]);
    }


    public function actionDeletekpa($id)
    {
        $kpa = KPA::findOne($id);

        //@todo: make sure to check for a valid object/model
        if(isset($kpa)) {
            $kpa->delete($id);
        }

        Yii::$app->response->redirect(array('/site/index'));
    }
    public function actionDeletegoal($goal_id, $kpa_id)
    {
        $goal = Goal::findOne($goal_id);

        //@todo: make sure to check for a valid object/model
        if(isset($goal)) {
            $goal->delete($goal_id);
        }

        Yii::$app->response->redirect(array('/site/viewkpa', 'id'=>$kpa_id));
    }
    public function actionDeletekpi($kpi_id, $goal_id)
    {
        $kpi = KPI::findOne($kpi_id);

        //@todo: make sure to check for a valid object/model
        if(isset($kpi)) {
            $kpi->delete($kpi_id);
        }

        Yii::$app->response->redirect(array('/site/viewgoal', 'id'=>$goal_id));
    }
    public function actionDeletemetric($metric_id, $kpi_id)
    {
        $metric = Metrics::findOne($metric_id);

        //@todo: make sure to check for a valid object/model
        if(isset($metric)) {
            $metric->delete($metric_id);
        }

        Yii::$app->response->redirect(array('/site/viewkpi','id'=>$kpi_id));
    }
}










