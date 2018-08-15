<?php

namespace common\models;

use Yii;

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
class SettngItem extends \common\components\BaseActiveRecord
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
            [['data'], 'string'],
            [['status', 'sort_index', 'created_at', 'updated_at'], 'integer'],
            [['cate_id', 'type', 'title', 'slug', 'cate_slug'], 'string', 'max' => 64],
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
            'cate_id' => '分组ID',
            'cate_slug' => '分组slug',
            'type' => '类型',
            'title' => '标题',
            'slug' => '标识',
            'data' => '数据',
            'description' => '描述',
            'status' => '状态',
            'sort_index' => '排序',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
