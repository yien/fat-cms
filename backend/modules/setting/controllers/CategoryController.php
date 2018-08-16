<?php

namespace backend\modules\setting\controllers;

use backend\modules\setting\search\CategorySearch;
use Yii;
use common\models\SettngCategory;
use backend\components\BaseController;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `setting` module
 */
class CategoryController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }


    /**
     * @return string
     */
    public function actionCreate()
    {
        $model = new SettngCategory();
        if ( app()->request->isPost ) {
            if ($model->load(app()->request->post())) {
                if ($model->save()) {
                    app()->session->setFlash("success", "添加成功");
                }
            }
        }
        return $this->render("create", [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ( app()->request->isPost ) {
            if ($model->load(app()->request->post())) {
                if ($model->save()) {
                    app()->session->setFlash("success", "编辑成功");
                }
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete()
    {

    }


    public function actionView()
    {

    }

    protected function findModel($id)
    {
        $model = SettngCategory::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Not Found Category");
        }
        return $model;
    }
}
