<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "fat_setting_category".
 *
 * @property int $id
 * @property int $pid 父分组ID
 * @property string $name 分组标题
 * @property string $slug 标识
 * @property string $type 类别
 * @property int $sort_index 排序
 * @property int $status 状态
 * @property int $created_at
 * @property int $updated_at
 */
class SettngCategory extends \common\components\BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fat_setting_category';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'pid', 'sort_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 64],
            [['slug'], 'unique'],
            [['type', 'pid'], 'default', 'value' => 0]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '父分组',
            'name' => '标题',
            'slug' => '标识',
            'type' => '类别',
            'sort_id' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }



    /**
     * 获取所有的分类
     */
    public static function getCategories()
    {
        $data = self::find()->all();
        $data = ArrayHelper::toArray($data);
        return $data;

    }

    /**
     * @return array
     */
    public static function getOptions()
    {
        $data = self::getCategories();
        $tree = get_tree($data);
        $list = ['顶级分组'];
        foreach ($tree as $value) {
            $list[$value['id']] = $value['name'];
        }
        return $list;
    }


    public function getItems()
    {
        return $this->hasMany(SettngItem::class, ['cate_id' => 'id']);
    }

}
