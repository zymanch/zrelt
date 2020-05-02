<?php

use yii\db\Migration;

/**
 * Class m200502_135353_user_seller
 */
class m200502_135353_user_seller extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE `user`
	ADD COLUMN `seller_id` INT UNSIGNED NULL DEFAULT NULL AFTER `id`,
	ADD CONSTRAINT `FK_user_seller` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`) ON UPDATE CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200502_135353_user_seller cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200502_135353_user_seller cannot be reverted.\n";

        return false;
    }
    */
}
