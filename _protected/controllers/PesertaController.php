<?php

namespace app\controllers;

use Yii;
use app\models\Peserta;
use app\models\Dokumenpendukung;
use app\models\search\PesertaSearch;
use app\models\search\DokumenpendukungSearch;
//use yii\web\Controller;
use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;

/**
 * PesertaController implements the CRUD actions for Peserta model.
 */
class PesertaController extends AppController
{
    
    /**
     * Lists all Peserta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PesertaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peserta model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'details' => $this->findDetail($id),
            'foto' => $this->findDokumen($id),
        ]);
    }

    /**
     * Creates a new Peserta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peserta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nikkes]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Peserta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nikkes]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Peserta model.
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
     * Finds the Peserta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Peserta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peserta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findDetail($id)
    {
        $detailModel = new DokumenpendukungSearch();
        return $detailModel->search(['DokumenpendukungSearch'=>['peserta_id'=>$id,'tag_id'=>'99']]);
    }

    protected function findDokumen($id)
    {
        
        $detailDokumen =  DokumenPendukung::find()->where(['peserta_id'=>$id,'tag_id'=>'5'])->one();
        //$detailDokumen->search(['DokumenpendukungSearch'=>['peserta_id'=>$id,'tag_id'=>'5']]);

        if (!empty($detailDokumen->uploaded_file_id))
        {
        return $foto = \app\models\UploadedFile::find()->where(['id'=>$detailDokumen->uploaded_file_id])->one();

        }
    }
}
