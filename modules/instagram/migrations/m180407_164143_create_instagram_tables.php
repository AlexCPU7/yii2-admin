<?php

use yii\db\Migration;

class m180407_164143_create_instagram_tables extends Migration
{
    public function safeUp(){

        $this->createTable('instagram_user_accounts', [
            'id'        => $this->primaryKey(),
            'user_id'   => $this->integer()->notNull(),
            'account'   => $this->string()->notNull(),
            'avatar'    => $this->string()->notNull(),
            'name'    => $this->string()->notNull(),
            'descr'     => $this->string()->notNull(),
            'followers' => $this->integer()->notNull(),
            'following' => $this->integer()->notNull(),
            'posts'     => $this->integer()->notNull(),
            'datatime'  => $this->integer()->notNull(),
        ]);

        $this->createTable('instagram_statistic', [
            'id'        => $this->primaryKey(),
            'user_id'   => $this->integer()->notNull(),
            'account'   => $this->string()->notNull(),
            'followers' => $this->integer()->notNull(),
            'following' => $this->integer()->notNull(),
            'posts'     => $this->integer()->notNull(),
            'datatime'  => $this->integer()->notNull(),
        ]);

    }

    public function safeDown(){

        $this->dropTable('instagram_user_accounts');
        $this->dropTable('instagram_statistic');

    }

}
