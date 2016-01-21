<?php

namespace frontend\controllers;

use Yii;
use frontend\models\MonitoringKacamata;
use frontend\models\search\MonitoringKacamataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\base\InvalidCallException;

/**
 * MonitoringKacamataController implements the CRUD actions for MonitoringKacamata model.
 */
class MonitoringkacamataController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all MonitoringKacamata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MonitoringKacamataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MonitoringKacamata model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = new MonitoringKacamata;
        $post = Yii::$app->request->post();   
        // process ajax delete
        $post = Yii::$app->request->post();

        $cek = (Yii::$app->user->can('admin')) ? true : false ;

        if (Yii::$app->request->isAjax && isset($post['kvdelete']) && $cek) {
            $id = $post['id'];
            if ($this->findModel($id)->delete() ) {
                echo Json::encode([
                    'success' => true,
                    'messages' => [
                        'kv-detail-info' => 'The book # ' . $id . ' was successfully deleted. <a href="' . 
                            Url::to(['/monitoringkacamata']) . '" class="btn btn-sm btn-info">' .
                            '<i class="glyphicon glyphicon-hand-right"></i>  Click here</a> to proceed.'
                    ]
                ]);
            } else {
                echo Json::encode([
                    'success' => false,
                    'messages' => [
                        'kv-detail-error' => 'You are not allowed to do this operation. Contact the administrator..'
                    ]
                ]);
            }
            return;
        }
        //throw new InvalidCallException("You are not allowed to do this operation. Contact the administrator.");
        // return messages on update of record
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('kv-detail-success', 'Success Message');
            Yii::$app->session->setFlash('kv-detail-warning', 'Warning Message');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MonitoringKacamata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MonitoringKacamata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MonitoringKacamata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MonitoringKacamata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MonitoringKacamata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MonitoringKacamata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MonitoringKacamata::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
