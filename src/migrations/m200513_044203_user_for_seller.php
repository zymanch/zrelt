<?php

use yii\db\Migration;

/**
 * Class m200513_044203_user_for_seller
 */
class m200513_044203_user_for_seller extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE `seller`
	ADD COLUMN `user_id` INT(11) UNSIGNED NULL DEFAULT NULL AFTER `id`,
	ADD CONSTRAINT `FK_seller_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT
');
        $this->execute('ALTER TABLE `user`
	DROP COLUMN `seller_id`,
	DROP FOREIGN KEY `FK_user_seller`');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200513_044203_user_for_seller cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200513_044203_user_for_seller cannot be reverted.\n";

        return false;
    }
    */
}
