<?php

namespace common\components;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class BaseActiveRecord extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }
}