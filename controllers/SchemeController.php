<?php

namespace app\controllers;

use Yii;
use app\models\Scheme;
use app\models\SchemeSearch;
use app\models\Shch;
use app\models\Shl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ShchHistory;

/**
 * SchemeController implements the CRUD actions for Scheme model.
 */
class SchemeController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Scheme models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        } else {
            $searchModel = new SchemeSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Scheme model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Scheme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            $model = new Scheme();
            $model_shch = new Shch();
            $model_shl = new Shl();
            $model->id_org = Yii::$app->user->identity->id_org;
            $model->number = Scheme::find()->where(['id_org' => Yii::$app->user->identity->org])->max('number') + 1;
            if ($model->load(Yii::$app->request->post()) && $model->save() && $model_shch->load(Yii::$app->request->post()) && $model_shch->save() ) {
                $model_shch->number_scheme = $model->id;
                $model_shch->save();
                $model_shl->number_scheme = $model->id;
                if($model_shch->date_shl == "") {
                    $model_shl->result = 4;
                    $model->result = 4;
                }else{
                    $model_shl->result = 3;
                    $model->result = 3;
                }
                $model_shl->save();
                $model->id_shl = $model_shl->id;
                $model->id_shch = $model_shch->id;
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('create', [
                'model' => $model,
                'model_shch' => $model_shch,
            ]);
        }
    }

    /**
     * Updates an existing Scheme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Scheme model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            $this->findModel($id)->delete();

            return $this->redirect(array('site/index'));
        }
    }

    /**
     * Finds the Scheme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Scheme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            if (($model = Scheme::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
