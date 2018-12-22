<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trip`.
 */
class m181114_160947_create_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trip', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'user_id' => $this->integer(10)->unsigned()->notNull(),
            'from' => $this->integer(10)->unsigned()->notNull(),
            'to' => $this->integer(10)->unsigned()->notNull(),
            'date' => $this->dateTime(),
            'duration' => $this->decimal(10, 1),
            'price' => $this->decimal(10, 2),
            'currency_id' => $this->integer(10)->notNull(),
            'status' => $this->tinyInteger()->notNull()->defaultValue('1'),
            'created' => $this->timestamp()->notNull(),
            'updated' => $this->timestamp()->notNull(),
        ]);

        $this->createIndex('idx_trip_user_id_user', 'trip', 'user_id');
        $this->addForeignKey('fk_trip_user_id_user', 'trip', 'user_id', 'user', 'id', 'restrict', 'cascade');


        $this->createIndex('idx_trip_from_place', 'trip', 'from');
        $this->addForeignKey('fk_trip_from_place', 'trip', 'from', 'place', 'id');


        $this->createIndex('idx_trip_to_place', 'trip', 'to');
        $this->addForeignKey('fk_trip_to_place', 'trip', 'to', 'place', 'id', 'restrict', 'cascade');


        $this->createIndex('idx_trip_id_currency_idx', 'trip', 'id');
        $this->addForeignKey('fk_trip_id_currency_idx', 'trip', 'id', 'currency', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_trip_user_id_user','trip');
        $this->dropIndex('idx_trip_user_id_user','trip');

        $this->dropForeignKey('fk_trip_from_place','trip');
        $this->dropIndex('idx_trip_from_place','trip');

        $this->dropForeignKey('fk_trip_id_currency_idx','trip');
        $this->dropIndex('idx_trip_id_currency_idx','trip');

        $this->dropTable('trip');
    }
}
