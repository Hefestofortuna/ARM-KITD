<?php

namespace app\controllers;

use app\models\Scheme;
use app\models\Shch;
use Yii;
use app\models\Shl;
use app\models\ShlSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShlController implements the CRUD actions for Shl model.
 */
class ShlController extends Controller
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
     * Lists all Shl models.
     * @return mixed
     */
    /*
    public function actionIndex()
    {
        $searchModel = new ShlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    */

    /**
     * Displays a single Shl model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    */

    /**
     * Creates a new Shl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*
    public function actionCreate()
    {
        $model = new Shl();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    */

    /**
     * Updates an existing Shl model.
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
        elseif(Yii::$app->user->identity->id_post == 2) {
            $model = $this->findModel($id);
            $model_scheme = Scheme::findOne(['id'=> $model->number_scheme]);
            if($model->date_shl !== "")
            {
                $model_scheme->result = 0;
                $model->result = 0;
            }
            $model_scheme->save();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['/scheme/view', 'id' => $model->number_scheme]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Shl model.
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

            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Shl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            if (($model = Shl::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
