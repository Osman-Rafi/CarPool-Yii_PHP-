<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181114_154039_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */


    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'uid' => $this->string(60)->notNull(),
            'username' => $this->string(45)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'password' => $this->string(60)->notNull(),
            'status' => $this->integer(4)->notNull()->defaultValue('0'),
            'contact_email' => $this->boolean()->notNull()->defaultValue('0'),
            'contact_phone' => $this->boolean()->notNull()->defaultValue('0'),
            'created' => $this->timestamp()->notNull(),
            'updated' => $this->timestamp()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }


    /* public function safeUp()
     {
         $this->createTable('user', [
             'id' => $this->primaryKey()->unsigned()->notNull(),
             'uid' => $this->string(60)->notNull(),
             'username' => $this->string(45)->notNull(),
             'email' => $this->string(255)->notNull()->unique(),
             'password' => $this->string(60)->notNull(),
             'status' => $this->integer(4)->notNull()->defaultValue('0'),
             'contact_email' => $this->boolean()->notNull()->defaultValue('0'),
             'contact_phone' => $this->boolean()->notNull()->defaultValue('0'),
             'created' => $this->timestamp()->notNull(),
             'updated' => $this->timestamp()->notNull()
         ]);
     }

     /**
      * {@inheritdoc}
      */
    public function safeDown()
    {
        $this->dropTable('user');
    }*/
}
