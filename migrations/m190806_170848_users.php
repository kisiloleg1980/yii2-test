<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m190806_170848_users
 */
class m190806_170848_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE
            utf8_general_ci ENGINE=InnoDB';
            }

        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'login' => Schema::TYPE_STRING,
            'hash' => Schema::TYPE_STRING,
            ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190806_170848_users cannot be reverted.\n";

        return false;
    }
    */
}
