<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m181114_161756_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function up()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'from_user_id' => $this->integer(10)->unsigned()->notNull(),
            'to_user_id' => $this->integer(10)->unsigned()->notNull(),
            'trip_id' => $this->integer(10)->unsigned()->notNull(),
            'text' => $this->string()->notNull(),
            'created' => $this->timestamp()
        ]);


        $this->createIndex('idx_message_from_user_id_user', 'message', 'from_user_id');
        $this->addForeignKey('fk_message_from_user_id_user', 'message', 'from_user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_message_to_user_id_user', 'message', 'to_user_id');
        $this->addForeignKey('fk_message_to_user_id_user', 'message', 'to_user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_message_trip_id_trip', 'message', 'trip_id');
        $this->addForeignKey('fk_message_trip_id_trip', 'message', 'trip_id', 'trip', 'id', 'restrict', 'cascade');

    }

    public function down()
    {
        $this->dropForeignKey('fk_message_from_user_id_user', 'message');
        $this->dropIndex('idx_message_from_user_id_user', 'message');


        $this->dropForeignKey('fk_message_to_user_id_user', 'message');
        $this->dropIndex('idx_message_to_user_id_user', 'message');

        $this->dropForeignKey('fk_message_to_user_id_user', 'message');
        $this->dropIndex('idx_message_to_user_id_user', 'message');

        $this->dropTable('message');
    }

/*    public function safeUp()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'from_user_id' => $this->integer(10)->unsigned()->notNull(),
            'to_user_id' => $this->integer(10)->unsigned()->notNull(),
            'trip_id' => $this->integer(10)->unsigned()->notNull(),
            'text' => $this->string()->notNull(),
            'created' => $this->timestamp()
        ]);


        $this->createIndex('idx_message_from_user_id_user', 'message', 'from_user_id');
        $this->addForeignKey('fk_message_from_user_id_user', 'message', 'from_user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_message_to_user_id_user', 'message', 'to_user_id');
        $this->addForeignKey('fk_message_to_user_id_user', 'message', 'to_user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_message_trip_id_trip', 'message', 'trip_id');
        $this->addForeignKey('fk_message_trip_id_trip', 'message', 'trip_id', 'trip', 'id', 'restrict', 'cascade');
    }


    public function safeDown()
    {
        $this->dropForeignKey('fk_message_from_user_id_user', 'message');
        $this->dropIndex('idx_message_from_user_id_user', 'message');


        $this->dropForeignKey('fk_message_to_user_id_user', 'message');
        $this->dropIndex('idx_message_to_user_id_user', 'message');

        $this->dropForeignKey('fk_message_to_user_id_user', 'message');
        $this->dropIndex('idx_message_to_user_id_user', 'message');

        $this->dropTable('message');
    }*/
}
