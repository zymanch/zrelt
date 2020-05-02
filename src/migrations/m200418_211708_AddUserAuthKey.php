<?php

use yii\db\Migration;

/**
 * Class m200418_211708_AddUserAuthKey
 */
class m200418_211708_AddUserAuthKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('zrelt.user','auth_key',$this->string(64)->defaultValue(null)->after('password')->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200418_211708_AddUserAuthKey cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200418_211708_AddUserAuthKey cannot be reverted.\n";

        return false;
    }
    */
}
