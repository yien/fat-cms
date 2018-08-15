<?php

namespace backend\modules\setting\controllers;

use backend\modules\setting\search\CategorySearch;
use Yii;
use common\models\SettngCategory;
use backend\components\BaseController;

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


    public function actionDelete()
    {

    }


    public function actionView()
    {

    }

    public function findModel()
    {

    }
}
