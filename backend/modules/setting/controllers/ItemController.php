<?php
namespace backend\modules\setting\controllers;

use common\models\SettngCategory;
use common\models\SettngItem;
use Yii;
use backend\components\BaseController;
use backend\modules\setting\search\ItemsSearch;
use yii\web\NotFoundHttpException;

class ItemController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionCreate()
    {
        $model = new SettngItem();
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


    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
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


    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        $model = SettngItem::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Not Found Item");
        }
        return $model;
    }


    public function actionTree()
    {
        $list = app()->settings->getItems("express");
        var_dump($list);exit;
//        $cate = SettngCategory::findOne(9);
//        $ret = $cate->getItems()->asArray()->all();
//        var_dump($ret);
//        exit;
////        $list = SettngCategory::getCategories();
////        $res = get_tree($list);
////        var_dump($res);
    }
}