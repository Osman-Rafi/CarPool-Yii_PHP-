<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m181113_163301_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey()->unsigned(),
            'code' => $this->string(45)->notNull()->unique(),
            'sign_format' => $this->string(45)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }
}
