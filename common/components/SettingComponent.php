<?php
namespace common\components;

use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class SettingComponent extends Component
{
    /**
     * @var string
     */
    public $categoryClass = "\common\models\SettngCategory";

    /**
     * @var string
     */
    public $settingClass = "\common\models\SettngItem";


    protected $model = [];

    public function init()
    {
        parent::init();
    }

    /**
     * @param $key
     * @param null $default
     * @param bool $isGroup
     * @return null
     */
    public function getItem($key, $default = null)
    {
        $model = $this->settingClass;
        $data = $model::find()->where("slug = :slug", [':slug' => $key])->orWhere("id = :id", [':id' => $key])->scalar("data");
        return $data ? $data : $default;
    }

    /**
     *  删除配置
     *  $key
     */
    public function removeItem($key)
    {
        $obj = $this->settingClass;
        $model = $obj::findOne(['slug' => $key]);
        if ($model) {
            return $model->delete();
        }
        return null;
    }

    /**
     * 更改配置
     */
    public function setItem($key, $value)
    {
        $obj = $this->settingClass;
        $model = $obj::findOne(['slug' => $key]);
        if (!$model) {
            return false;
        }
        $model->data = $value;
        return $model->save();
    }


    /**
     * @param $cateSlug
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function getItems($cateSlug)
    {
        $obj = $this->categoryClass;
        $model = $obj::findOne(['slug' => $cateSlug]);
        if (!$model) {
            throw new NotFoundHttpException("{$cateSlug} Not Found");
        }
        $all = $model->getItems()->asArray()->all();
        if ($all) {
            return ArrayHelper::map($all, 'id', 'name');
        }
        return null;
    }
}