<?php

use common\components\Migration;

/**
 * Class m180815_160033_pay_order
 */
class m180815_160033_pay_order extends Migration
{
    const TABLE_NAME = "{{%product_order}}";
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'trade_no' => $this->string()->notNull()->unique()->comment("订单号"),
            'product_id' => $this->integer()->notNull()->comment("商品ID"),
            'page_id' => $this->integer()->notNull()->comment("详情页ID"),
            'package_id' => $this->integer()->notNull()->comment("套餐ID"),
            'package_name' => $this->string()->notNull()->comment("套餐名称"),
            'package_detail' => $this->string()->notNull()->defaultValue("")->comment("套餐明细"),
            'package_price' => $this->integer()->notNull()->defaultValue(0)->comment("套餐单价"),
            'quantity' => $this->integer()->notNull()->defaultValue(1)->comment("数量"),
            'total_fee' => $this->integer()->notNull()->defaultValue(0)->comment("商品总价"),
            'paid_fee' => $this->integer()->notNull()->defaultValue(0)->comment("实付金额"),
            'real_name' => $this->string()->notNull()->comment("姓名"),
            'phone' => $this->string()->notNull()->comment("手机号"),
            'id_card' => $this->string()->notNull()->defaultValue("")->comment("身份证号"),
            'province' => $this->integer()->notNull()->comment("省份"),
            'city' => $this->integer()->notNull()->comment("城市"),
            'area' => $this->integer()->notNull()->comment("地区"),
            'address' => $this->string(255)->notNull()->comment("地址"),
            'full_address' => $this->string(255)->notNull()->comment("详细地址"),
            'remark' => $this->string(255)->notNull()->defaultValue("")->comment("备注"),
            'client_ip' => $this->string()->notNull()->defaultValue("")->comment("下单IP"),
            'trade_status' => $this->tinyInteger()->notNull()->defaultValue(0)->comment("交易状态"),
            'pay_type' => $this->tinyInteger()->notNull()->defaultValue(1)->comment("支付类型"),
            'is_active' => $this->tinyInteger()->notNull()->defaultValue(1)->comment("是否有效"),
            'is_repeat' => $this->tinyInteger()->notNull()->defaultValue(0)->comment("是否重复"),
            'email_notify' => $this->tinyInteger()->notNull()->defaultValue(0)->comment("邮件通知"),
            'sms_notify' => $this->tinyInteger()->notNull()->defaultValue(0)->comment("短信通知"),
            'express_id' => $this->integer()->defaultValue(0)->comment("快递名称"),
            'express_no' => $this->string()->notNull()->comment("快递单号"),
            'created_at' => $this->integer()->comment("下单时间"),
            'updated_at' => $this->integer()->comment("更新时间"),
        ], $this->tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180815_160033_pay_order cannot be reverted.\n";
        $this->dropTable(self::TABLE_NAME);
//        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180815_160033_pay_order cannot be reverted.\n";

        return false;
    }
    */
}
