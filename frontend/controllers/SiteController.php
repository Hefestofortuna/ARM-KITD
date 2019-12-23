<?php
namespace frontend\controllers;

use common\models\Signup;
use Yii;
use yii\web\Controller;
use common\models\Login;
use app\models\Scheme;
use app\models\SchemeSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{


    public function actionIndex()
    {

        //return $this->render('index');
        $searchModel = new SchemeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSignup()
    {
        $model = new Signup();
        if(Yii::$app->request->post('Signup'))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup())
            {
                return $this->goHome();
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        $login_model = new Login();
        if(Yii::$app->request->post('Login'))
        {
            $login_model->attributes = Yii::$app->request->post('Login');
            if($login_model->validate()){
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }
        return $this->render('login',['login_model'=>$login_model]);
    }

    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }

    public function actionContact()
    {
        return $this->render('contact');
    }
}
