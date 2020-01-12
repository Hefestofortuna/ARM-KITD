<?php

namespace app\controllers;

use Yii;    
use app\models\Scheme;
use app\models\SchemeSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\behaviors\AccessBehavior;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        /*
            Везде, где будет определен данный метод, будет ограничен доступ для гостей
            (Конкретно будет перенаправлять на хуй знает куда)
        */
        return [
            AccessBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            $searchModel = new SchemeSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string     
    
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            Yii::$app->user->logout();

            return $this->goHome();
        }
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            $model = new ContactForm();
            if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('contactFormSubmitted');

                return $this->refresh();
            }
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            return $this->render('about');
        }
    }
}
