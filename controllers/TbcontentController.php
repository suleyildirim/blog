<?php

namespace suleyildirim\blog\controllers;

use Yii;
use suleyildirim\blog\models\Tbcontent;
use suleyildirim\blog\models\TbcontentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
/**
 * TbcontentController implements the CRUD actions for Tbcontent model.
 */
class TbcontentController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),                
                'rules' => [   
                    /*[
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],  //LİST VİEW OLURSA BURADA GÖSTER*/               
                    [
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tbcontent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbcontentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbcontent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tbcontent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        if (Yii::$app->user->can('createContent')) {
            $model = new Tbcontent();
            if ($model->load(Yii::$app->request->post()) && Yii::$app->user->getID() != null) {


                /*$fileName = $model->name;
                $model->file =UploadedFile::getInstance($model,'file');
                $model->file->saveAs('uploadQuiz/'.$fileName.'.'.$model->file->extension );
                $model->filePath = 'uploadQuiz/'.$fileName.'.'.$model->file->extension ;
                $model->save();*/

                //File Yükle
                $imageName = $model->id;
                //$imageName = 'dd!';
                //////////$model->file = UploadedFile::getInstance($model,'file');
                //if($model->file){
                 //   $imageName = 'uploads/';
                 //   //database kaydetme
                //    $model->logo = $imageName.rand(10,1000).'.'.$model->file->name;
               // }
               //////////// $model->file->saveAs('uploads/'.$imageName.rand(10,1000).'.'.$model->file->name.'.'.$model->file->extension);
                //database kaydetme
                ////////////$model->logo = 'uploads/'.$imageName.rand(10,1000).'.'.$model->file->name.'.'.$model->file->extension;

                if ($model->file = UploadedFile::getInstance($model,'file')) {
                    //$model->file->saveAs(Yii::getAlias('@webroot') .'/uploads/' .$model->logo = $newfname);

                    $model->file->saveAs('uploads/'.$imageName.rand(10,1000).'.'.$model->file->name.'.'.$model->file->extension);
                    //database kaydetme
                    $model->logo = 'uploads/'.$imageName.rand(10,1000).'.'.$model->file->name.'.'.$model->file->extension;
                    //$model->save();
                }
               
                /*$model->file = UploadedFile::getInstance($model,'logo');
                $ext = substr(strrchr($model->file,'.'),1);
                if($ext != null)
                {                
                   $newfname = $model->user_username.'.'.$ext;
                   $model->file->saveAs(Yii::getAlias('@webroot') .'/uploads/' .$model->logo = $newfname);
                } */

              /*  $imageName = $model->id;

                     $model->imageFiles = UploadedFile::getInstances($model, 'logo');

                     $all_files_paths = [];

                     foreach ($model->logo as $file_instance) {
                        // this should hold the new path to which your file will be saved
                        $path = 'uploads/' . $file_instance->baseName . '.' . $file_instance->extension;

                        // saveAs() method will simply copy the file 
                        // from its temporary folder (C:\xampp\tmp\php29C.tmp) 
                        // to the new one ($path) then will delete the Temp File
                        $file_instance->saveAs($path);

                        // here the file should already exist where specified within $path and 
                        // deleted from C:\xampp\tmp\ just save $path content somewhere or in case you need $model to be
                        // saved first to have a valid Primary Key to maybe use it to assign
                        // related models then just hold the $path content in an array or equivalent :
                        $all_files_pathes []= $path;
                     }

                     $model->save();
*/
                $model->author = Yii::$app->user->getId();
                if ($model->save()){
                   /* if($model->file){
                        $model->file->saveAs($model->logo)
                    }*/
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else{
            Yii::$app->session->setFlash('error', 'İçerik oluşturma yetkiniz yok');
            $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Tbcontent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->can('updateContent', ['Tbcontent' => $model])) {
            //File Yükle
                $imageName = $model->id;

                if ($model->file = UploadedFile::getInstance($model,'file')) {
                    //$model->file->saveAs(Yii::getAlias('@webroot') .'/uploads/' .$model->logo = $newfname);

                    $model->file->saveAs('uploads/'.$imageName.rand(10,1000).'.'.$model->file->name.'.'.$model->file->extension);
                    //database kaydetme
                    $model->logo = 'uploads/'.$imageName.rand(10,1000).'.'.$model->file->name.'.'.$model->file->extension;
                    //$model->save();
                }
                
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            Yii::$app->session->setFlash('error', 'Sadece kendi içeriklerinizi güncelleyebilirsiniz!');
            $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Tbcontent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->can('deleteContent', ['Tbcontent' => $model])) {         
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            Yii::$app->session->setFlash('error', 'Sadece kendi içeriklerinizi silebilirsiniz!');
            $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tbcontent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbcontent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbcontent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
