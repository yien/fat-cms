<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        /**
         * frontend user
         */
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->defaultValue(""),
            'mobile' => $this->string(64)->notNull()->defaultValue(""),
            'level' => $this->smallInteger()->notNull()->defaultValue(10),
            'type' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_ip' => $this->string(64)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

        /**
         * frontend user info
         */
        $this->createTable('{{%user_profile}}', [
            'id' => $this->primaryKey(),
            'nickname' => $this->string()->notNull()->unique(),
            'user_id' => $this->integer()->notNull()->unique(),
            'avatar_url' => $this->string()->notNull()->defaultValue(""),
            'real_name' => $this->string()->notNull()->defaultValue(""),
            'birth_date' => $this->date()->notNull(),
            'id_card' => $this->string(64)->notNull()->unique()->defaultValue(""),
            'gender' => $this->smallInteger()->notNull()->defaultValue(0),
            'country' => $this->string()->notNull()->defaultValue(""),
            'region' => $this->string()->notNull()->defaultValue(""),
            'city' => $this->string()->notNull()->defaultValue(""),
            'created_at' => $this->integer()->notNull(),
            'register_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        /**
         * frontend user oauth2
         */
        $this->createTable('{{%user_oauth}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'nickname' => $this->string()->notNull(),
            'avatar_url' => $this->string()->notNull(),
            'oauth_type' => $this->string(64)->notNull(),
            'oauth_id' => $this->string()->notNull(),
            'oauth_access_token' => $this->string()->notNull(),
            'oauth_expires' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ]);

        /**
         * frontend user op 记录
         */
        $this->createTable('{{%user_op_log}}', [

            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'action_group' => $this->string(64)->notNull(),
            'action' => $this->string(64)->notNull(),
            'ip' => $this->string(64)->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);


        /**
         * backend user
         */
        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'mobile' => $this->string(64)->notNull()->unique(),
            'created_ip' => $this->string(64)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->db->createCommand()->insert("{{%admin}}", [
            'username' => 'fatadmin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash("fatadmin888"),
            'email' => "admin@fatcms.xyz",
            'mobile' => '13800138000',
            'created_ip' => '127.0.0.1',
            'created_at' => time(),
            'updated_at' => time(),
            'status' => 1
        ])->execute();
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%user_profile}}');
        $this->dropTable('{{%user_oauth}}');
        $this->dropTable('{{%admin}}');
    }
}
