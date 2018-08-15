<?php
namespace backend\modules\setting\search;

use common\models\SettngCategory;
use yii\data\ActiveDataProvider;

class CategorySearch extends SettngCategory
{
    public function rules()
    {
        return [
            [['name','slug'], 'string'],
        ];
    }

    public function search($params)
    {
        $query = parent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'name', $this->name, true]);
        $query->andFilterWhere(['like', 'slug', $this->name, true]);
        return $dataProvider;
    }
}