<?php

use common\components\Migration;

/**
 * Class m180815_140759_product
 */
class m180815_140759_product extends Migration
{

    const TABLE_PRODUCT = "{{%product}}";

    const TABLE_CATEGORY = "{{%product_category}}";

    const TABLE_PAGE = "{{%product_page}}";

    const TABLE_PACKAGE = "{{%product_package}}";

    const TABLE_PACKAGE_ATTR = "{{%product_package_attr}}";

    const TABLE_MODULE = "{{%page_module}}";

    const TABLE_PRODUCT_LIST = "{{%product_list}}";
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        /**
         * 商品列表
         */
        $this->createTable(self::TABLE_PRODUCT, [
            'id' => $this->primaryKey(),
            'product_name' => $this->string()->notNull()->defaultValue("")->comment("商品名称"),
            'product_info' => $this->text()->comment("商品介绍"),
            'cate_id' => $this->integer()->comment("分类ID"),
            'product_status' => $this->tinyInteger()->defaultValue(1)->comment("状态"),
            'product_type' => $this->tinyInteger()->defaultValue(1)->comment("类型"),
            'created_at' => $this->integer()->comment("创建时间"),
            'updated_at' => $this->integer()->comment("最后更新时间"),
            'created_by' => $this->integer()->comment("创建者"),
        ], $this->tableOptions);


        /**
         * 商品分类
         */
        $this->createTable(
            self::TABLE_CATEGORY,[
                'id' => $this->primaryKey(),
                'cate_name' => $this->string()->notNull()->comment("分类名称"),
                'cate_desc' => $this->string()->notNull()->comment("分类描述"),
                'cate_pid' => $this->integer()->defaultValue(0)->comment("父分类ID"),
                'cate_slug' => $this->string()->notNull()->defaultValue("")->comment("分类别名"),
                'created_at' => $this->integer()->comment("创建时间"),
                'updated_at' => $this->integer()->comment("最后更新时间"),
                'created_by' => $this->integer()->comment("创建者"),
            ],$this->tableOptions
        );

        /**
         * 商品详情页
         */
        $this->createTable(
            self::TABLE_PAGE,[
                'id' => $this->primaryKey(),
                'product_id' => $this->integer()->notNull()->comment("商品ID"),
                'page_name' => $this->string()->notNull()->comment("页面名称"),
                'page_title' => $this->string()->notNull()->comment("页面标题"),
                'page_desc' => $this->string()->notNull()->comment("页面描述"),
                'page_keywords' => $this->string()->notNull()->comment("页面关键词"),
                'page_mobile' => $this->string()->notNull()->comment("售后电话"),
                'page_info' => $this->string()->notNull()->comment("备注"),
                'page_type' => $this->integer()->notNull()->defaultValue(1)->comment("页面类型"),
                'main_img_url' => $this->string()->notNull()->defaultValue("")->comment("页面主图"),
                'created_at' => $this->integer()->comment("创建时间"),
                'updated_at' => $this->integer()->comment("最后更新时间"),
                'created_by' => $this->integer()->comment("创建者"),
                'created_ip' => $this->string()->notNull()->defaultValue("")->comment("创建IP")
            ],$this->tableOptions
        );

        /**
         * 套餐
         */
        $this->createTable(self::TABLE_PACKAGE, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'page_id' => $this->integer()->comment("页面ID"),
            'package_name' => $this->string()->notNull()->comment("套餐名称"),
            'package_price' => $this->integer()->notNull()->comment("套餐价格"),
            'created_at' => $this->integer()->comment("创建时间"),
            'updated_at' => $this->integer()->comment("最后更新时间"),
        ],$this->tableOptions);

        /**
         * 套餐属性
         */
        $this->createTable(self::TABLE_PACKAGE_ATTR, [
            'id' => $this->primaryKey(),
            'package_id' => $this->integer()->comment("套餐ID"),
            'attr_name' => $this->string()->notNull()->comment("属性名"),
            'attr_type' => $this->string()->notNull()->defaultValue("text")->comment("属性类型"),
            'attr_val' => $this->string()->notNull()->comment("属性值"),
        ], $this->tableOptions);

        /**
         * 商品详情页配置
         */
        $this->createTable(self::TABLE_MODULE, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull()->comment("商品ID"),
            'page_id' => $this->integer()->notNull()->comment("商品详情页ID"),
            'module_name' => $this->string()->notNull()->defaultValue("")->comment("模块名称"),
            'module_slug' => $this->string()->notNull()->unique()->comment("模块标识"),
            'module_value' => $this->string()->notNull()->defaultValue("")->comment("模块值"),
            'module_type' => $this->string()->notNull()->comment("模块类型"),
            'is_show' => $this->tinyInteger()->notNull()->defaultValue(1)->comment("是否显示"),
            'module_status' => $this->tinyInteger()->notNull()->defaultValue(1)->comment("状态"),
            'sort_id' => $this->integer()->defaultValue(0)->comment("模块排序"),
            'created_at' => $this->integer()->comment("创建时间"),
            'updated_at' => $this->integer()->comment("最后更新时间"),
            'deleted_at' => $this->integer()->comment("删除时间"),
        ],$this->tableOptions);




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180815_140759_product cannot be reverted.\n";
        $this->dropTable(self::TABLE_PRODUCT);
        $this->dropTable(self::TABLE_CATEGORY);
        $this->dropTable(self::TABLE_PAGE);
        $this->dropTable(self::TABLE_PACKAGE);
        $this->dropTable(self::TABLE_PACKAGE_ATTR);
        $this->dropTable(self::TABLE_MODULE);


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180815_140759_product cannot be reverted.\n";

        return false;
    }
    */
}
