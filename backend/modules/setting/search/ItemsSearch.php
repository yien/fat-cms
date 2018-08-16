<?php
namespace backend\modules\setting\search;

use common\models\SettngItem;
use yii\data\ActiveDataProvider;

class ItemsSearch extends SettngItem
{
    public function rules()
    {
        return [
            [['name','slug', 'cate_slug'], 'string'],
            [['cate_id'], 'integer']
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
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'slug', $this->slug]);
        return $dataProvider;
    }
}