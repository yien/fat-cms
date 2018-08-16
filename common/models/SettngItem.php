<?php

namespace common\models;

use Yii;
use common\components\BaseActiveRecord;
/**
 * This is the model class for table "fat_setting".
 *
 * @property int $id
 * @property string $group_id 分组ID
 * @property string $type 类型
 * @property string $title 标题
 * @property string $slug 标识
 * @property string $data 数据
 * @property string $description 描述
 * @property int $status 状态
 * @property int $sort_index 排序
 * @property int $created_at
 * @property int $updated_at
 */
class SettngItem extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fat_setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'data', 'cate_id', 'type', 'status'], 'required'],
            [['data'], 'string'],
            [['status', 'sort_id', 'created_at', 'updated_at'], 'integer'],
            [['cate_id', 'type', 'name', 'slug', 'cate_slug'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate_id' => '配置组',
            'type' => '配置项类型',
            'name' => '配置项名称',
            'slug' => '配置项标识',
            'data' => '配置项值',
            'description' => '描述',
            'status' => '配置项状态',
            'sort_id' => '配置项排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }


    public function getCategory()
    {
        return $this->hasOne(SettngCategory::class, ['id' => 'cate_id']);
    }

}
