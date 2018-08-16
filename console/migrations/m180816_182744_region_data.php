<?php

use common\components\Migration;

/**
 * Class m180816_182744_region_data
 */
class m180816_182744_region_data extends Migration
{
    const TABLE_NAME = "{{%region_data}}";

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'label' => $this->string()->notNull()->comment("名称"),
            'pid' => $this->integer()->notNull()->defaultValue(0)->comment("父类"),
            'level' => $this->tinyInteger()->notNull()->defaultValue(0)->comment("级别"),
            'code' => $this->integer()->notNull()->comment("代码")
        ], $this->tableOptions);

        $dataPath = Yii::getAlias("@console") . '/data/region.data';
        $data = file_get_contents($dataPath);
        $jsonData = \yii\helpers\Json::decode($data);
        foreach ($jsonData as $items) {
            // 写入db
            $this->db->createCommand()->insert(self::TABLE_NAME, [
                'label' => $items['label'],
                'pid' => 0,
                'level' => 1,
                'code' => $items['value']
            ])->execute();
            $lastId = $this->db->getLastInsertID();
            if (isset($items['children']) && is_array($items['children'])) {
                foreach ($items['children'] as $item1) {
                    $this->db->createCommand()->insert(self::TABLE_NAME, [
                        'label' => $item1['label'],
                        'pid' => $lastId,
                        'level' => 2,
                        'code' => $item1['value']
                    ])->execute();
                    $lastId1 = $this->db->getLastInsertID();
                    if (isset($item1['children']) && is_array($item1['children'])) {
                        foreach ($item1['children'] as $item2) {
                            $this->db->createCommand()->insert(self::TABLE_NAME, [
                                'label' => $item2['label'],
                                'pid' => $lastId1,
                                'level' => 3,
                                'code' => $item2['value']
                            ])->execute();
                        }
                    }
                }
            }
        }


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180816_182744_region_data cannot be reverted.\n";

        return false;
    }
    */
}
