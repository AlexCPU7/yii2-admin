<?php

use yii\db\Migration;

class m180407_164143_create_instagram_tables extends Migration
{
    public function safeUp(){

        $this->createTable('accounts', [
            'id'        => $this->primaryKey(),
            'user_id'   => $this->integer()->notNull(),
            'accound'   => $this->string()->notNull(),
            'avatar'    => $this->string()->notNull(),
            'descr'     => $this->text()->notNull(),
            'posts'     => $this->integer()->notNull(),
            'followers' => $this->integer()->notNull(),
            'following' => $this->integer()->notNull(),
            'datatime'  => $this->integer()->notNull(),
        ]);

        $this->createTable('statistics', [
            'id'        => $this->primaryKey(),
            'user_id'   => $this->integer()->notNull(),
            'accound'   => $this->string()->notNull(),
            'posts'     => $this->integer()->notNull(),
            'followers' => $this->integer()->notNull(),
            'following' => $this->integer()->notNull(),
            'datatime'  => $this->integer()->notNull(),
        ]);

    }

    public function safeDown(){

        $this->dropTable('accounts');
        $this->dropTable('statistics');

    }

}
