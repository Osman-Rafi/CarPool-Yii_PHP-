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

        $this->batchInsert('currency',['code','sign_formate'],[
            ['AUD' , 'A$ [price]'],
            ['BGN' , '[price] лв.'],
            ['BRL' , 'R$ [price]'],
            ['CAD' , 'C$ [price]'],
            ['CHF' , '[price] CHF'],
            ['CZK' , 'Kč [price]'],
            ['DKK' , 'dkr [price]'],
            ['EUR' , '€ [price]'],
            ['GBP' , '£ [price]'],
            ['HRK' , '[price] kn'],
            ['HUF' , 'Ft [price]'],
            ['JPY' , '¥ [price]'],
            ['KRW' , '₩ [price]'],
            ['NOK' , 'nkr [price]'],
            ['PLN' , '[price] zł'],
            ['RUB' , '[price] руб'],
            ['SEK' , 'skr [price]'],
            ['TRY' , '[price] TL'],
            ['USD' , '$ [price]'],
            ['Taka', '৳ [price]'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('currency');

        $this->dropTable('currency');
    }
}
