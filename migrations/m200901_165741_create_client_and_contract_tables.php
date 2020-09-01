<?php

use yii\db\Migration;
use \yii\db\Schema;

/**
 * Class m200901_165741_create_client_and_contract_tables
 */
class m200901_165741_create_client_and_contract_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client', [
            'id'=> Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'surname' => Schema::TYPE_STRING.' NOT NULL',
            'email' => Schema::TYPE_STRING.' NOT NULL',
        ]);

        $this->createTable('contract', [
            'id'=>Schema::TYPE_PK,
            'number'=>Schema::TYPE_INTEGER ,
            'buyer_client' => Schema::TYPE_INTEGER  . ' NOT NULL',
            'seller_client' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date' => Schema::TYPE_STRING,
            'financial_amount'=>Schema::TYPE_INTEGER ,
            'description'=>Schema::TYPE_TEXT,
        ]);

        $this->addForeignKey('fk_buyer_client',  'contract', 'buyer_client',   'client', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_seller_client',  'contract', 'seller_client',   'client', 'id', 'RESTRICT', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200901_165741_create_client_and_contract_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200901_165741_create_client_and_contract_tables cannot be reverted.\n";

        return false;
    }
    */
}
