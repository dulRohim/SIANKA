<?php

namespace app\controllers;

use Yii;
use app\models\Pendaftar;
use app\models\Bagan;
use app\models\Kelas;
use app\models\KtgAtlet;
use app\models\Atlet;
use app\models\Kontingen;
use app\models\PendaftarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PendaftarController implements the CRUD actions for Pendaftar model.
 */
class PendaftarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'create', 'view', 'update', 'delete', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'view', 'create', 'update', 'delete', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pendaftar models.
     * @return mixed
     */
    public function actionIndex($ktg, $ev)
    {
        $searchModel = new PendaftarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ktg, $ev);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pendaftar model.
     * @param integer $id
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
     * Creates a new Pendaftar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ev, $ktg)
    {
        $model = new Pendaftar();

        if ($model->load(Yii::$app->request->post())) {
            if (Pendaftar::find()->where(['ktg_atlet_id' => $model->ktg_atlet_id, 'bagan_id' => $model->bagan_id])->one() != null) {
                echo "<script>alert( 'Data Sudah Ada' );</script>";
            } else{
                $temp = json_encode($model->info_grup);
                $model->info_grup = $temp;
                $model->save();
                return $this->redirect(['index', 'ktg' => $ktg, 'ev' => $ev]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'ev' => $ev,
            'ktg' => $ktg,
        ]);
    }

    /**
     * Updates an existing Pendaftar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $ev, $ktg)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $temp = json_encode($model->info_grup);
            $model->info_grup = $temp;
            $model->save();
            return $this->redirect(['index', 'ktg' => $ktg, 'ev' => $ev]);
        }

        $temp = json_decode($model->info_grup);
        $model->info_grup = $temp;

        return $this->render('update', [
            'model' => $model,
            'temp' => $temp,
            'ev' => $ev,
            'ktg' => $ktg,
        ]);
    }

    /**
     * Deletes an existing Pendaftar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $ev, $ktg)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'ktg' => $ktg, 'ev' => $ev]);
    }

    public function actionBagan($ev)
    {
        $searchModel = new PendaftarSearch();
        $dataProvider = $searchModel->searchBagan(Yii::$app->request->queryParams, $ev);

        $model = Bagan::find()->where(['event_id' => $ev])->all();

        // $dKelas = array();
        // foreach ($model as $models) {
        //     $dKelas[] = Kelas::find()->where(['kelas_id' => $models->kelas_id])->one();
        // }

        return $this->render('bagan', [
            'model' => $model,
            // 'ev' => $ev,
            // 'dKelas' => $dKelas,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // 'cKelas' => $cKelas,
            // 'ktg' => $ktg,
        ]);

        // $model = Bagan::find()->where(['event_id' => $ev])->all();

        // $dKelas = array();
        // foreach ($model as $models) {
        //     $dKelas[] = Kelas::find()->where(['kelas_id' => $models->kelas_id])->one();
        // }

        // if ($dKelas != NULL) {
        //    return $this->render('bagan', [
        //     'model' => $model,
        //     'ev' => $ev,
        //     'dKelas' => $dKelas,
        //     // 'cKelas' => $cKelas,
        //     // 'ktg' => $ktg,
        // ]);
        // } else {
        //     return $this->render('noList', [
        //     'model' => $model,
        //     // 'ev' => $ev,
        //     // 'cKelas' => $cKelas,
        //     // 'ktg' => $ktg,
        // ]);
        // } 
    }

    public function actionAtlet($kls)
    {
        $model = Pendaftar::find()->where(['bagan_id' => $kls])->all();
        $mKtgAtlet = array();
        foreach ($model as $model) {
            $mKtgAtlet[] = KtgAtlet::find()->where(['ktg_atlet_id' => $model->ktg_atlet_id])->one();
        }
        foreach ($mKtgAtlet as $mKtgAtlet) {
            $mAtlet[] = Atlet::find()->where(['atlet_nik' => $mKtgAtlet->atlet_nik])->one();
            $mKtg[] = Kontingen::find()->where(['kontingen_id' => $mKtgAtlet->kontingen_id])->one();
        }
        if ($mKtgAtlet != NULL) {
            return $this->render('atlet', [
                'model' => $model,
                'mKtgAtlet' => $mKtgAtlet,
                'mAtlet' => $mAtlet,
                'mKtg' => $mKtg,
            ]);
        } else {
            return $this->render('noList', [
                'model' => $model,
                // 'mKtgAtlet' => $mKtgAtlet,
                // 'mAtlet' => $mAtlet,
                // 'mKtg' => $mKtg,
            ]);
        }
    }

    public function actionJuara($kls, $ev)
    {
        $model = Pendaftar::find()->where(['bagan_id' => $kls])->andWhere(['or',
           ['prestasi'=>'1'],
           ['prestasi'=>'2'],
           ['prestasi'=>'3']])->orderBy(['prestasi' => SORT_ASC])->all();

        $kelas = Pendaftar::find()->where(['bagan_id' => $kls])->one();
        $mKtgAtlet = array();
        foreach ($model as $models) {
            $mKtgAtlet[] = KtgAtlet::find()->where(['ktg_atlet_id' => $models->ktg_atlet_id])->one();
        }
        foreach ($mKtgAtlet as $mKtgAtlet) {
            $mAtlet[] = Atlet::find()->where(['atlet_nik' => $mKtgAtlet->atlet_nik])->one();
            $mKtg[] = Kontingen::find()->where(['kontingen_id' => $mKtgAtlet->kontingen_id])->one();
        }
        if ($mKtgAtlet != NULL) {
            return $this->render('juara', [
                'model' => $model,
                'mKtgAtlet' => $mKtgAtlet,
                'mAtlet' => $mAtlet,
                'mKtg' => $mKtg,
                'kelas' => $kelas,
            ]);
        } else {
            return $this->render('noList', [
                'model' => $model,
            ]);
        }
    }

    public function actionMedali($ev)
    {
        $connection = Yii::$app->getDb();
        // $model = Pendaftar::find()->joinWith(['bagan', 'ktgAtlet','ktgAtlet.kontingen'])->where(['event_id' => $ev])->distinct()->all();
        $model = $connection->createCommand("SELECT DISTINCT `kontingen`.* FROM `pendaftar` LEFT JOIN `bagan` ON `pendaftar`.`bagan_id` = `bagan`.`bagan_id` LEFT JOIN `ktg_atlet` ON `pendaftar`.`ktg_atlet_id` = `ktg_atlet`.`ktg_atlet_id` LEFT JOIN `kontingen` ON `ktg_atlet`.`kontingen_id` = `kontingen`.`kontingen_id` WHERE `event_id`='".$ev."'")->queryAll();

        foreach ($model as $models) {
            $emas[] = KtgAtlet::find()->joinWith(['pendaftar'])->where(['kontingen_id' => $models['kontingen_id'], 'prestasi' => '1'])->count();
            $perak[] = KtgAtlet::find()->joinWith(['pendaftar'])->where(['kontingen_id' => $models['kontingen_id'], 'prestasi' => '2'])->count();
            $perunggu[] = KtgAtlet::find()->joinWith(['pendaftar'])->where(['kontingen_id' => $models['kontingen_id'], 'prestasi' => '3'])->count();
        }
        // $emas = count($emas);
        
        if ($model != NULL) {
            return $this->render('medali', [
                'model' => $model,
                'emas' => $emas,
                'perak' => $perak,
                'perunggu' => $perunggu,
            ]);
        } else {
            return $this->render('noList', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Finds the Pendaftar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pendaftar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pendaftar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
