<?php
namespace frontend\controllers;

use yii\web\Controller;

class PageController extends Controller
{

    /**
     * @param $pageId
     */
    public function actionIndex($pageId)
    {
        return $this->renderPartial("template_01");
    }
}