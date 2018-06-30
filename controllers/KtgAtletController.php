<?php

namespace app\controllers;

use Yii;
use app\models\KtgAtlet;
use app\models\KtgAtletSeaarch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KtgAtletController implements the CRUD actions for KtgAtlet model.
 */
class KtgAtletController extends Controller
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
     * Lists all KtgAtlet models.
     * @return mixed
     */
    public function actionIndex($ktg)
    {
        $searchModel = new KtgAtletSeaarch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ktg);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KtgAtlet model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KtgAtlet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ktg)
    {
        $model = new KtgAtlet();

        if ($model->load(Yii::$app->request->post()) ) {
           
            $model->kontingen_id = Yii::$app->user->identity->kontingen_id;
            $model->ktg_atlet_id = "KTA".$model->atlet_nik.$model->kontingen_id;

            if (KtgAtlet::find()->where(['ktg_atlet_id' => $model->ktg_atlet_id])->one() != null) {
                echo "<script>alert( 'Data Sudah Ada' );</script>";
            } else{
                $model->save();
                return $this->redirect(['index', 'ktg' => $ktg]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'ktg' => $ktg,
        ]);
    }

    /**
     * Updates an existing KtgAtlet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $ktg)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->kontingen_id = Yii::$app->user->identity->kontingen_id;
            $model->ktg_atlet_id = "KTA".$model->atlet_nik.$model->kontingen_id;

            if (KtgAtlet::find()->where(['ktg_atlet_id' => $model->ktg_atlet_id])->one() != null) {
                return $this->redirect(['index', 'ktg' => $ktg]);
            } else{
                $model->save();
                return $this->redirect(['index', 'ktg' => $ktg]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing KtgAtlet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $ktg)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'ktg' => $ktg]);
    }

    /**
     * Finds the KtgAtlet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return KtgAtlet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KtgAtlet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
