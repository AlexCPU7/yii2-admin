<?php

use yii\db\Migration;

/**
 * Class m180404_154630_create_tables_instagram
 */
class m180404_154630_create_tables_instagram extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('instagram_user_account', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name_account' => $this->string()->notNull()
        ]);

        $this->createTable('instagram_info', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'folo' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

}
