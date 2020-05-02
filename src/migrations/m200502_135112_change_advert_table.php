<?php

use yii\db\Migration;

/**
 * Class m200502_135112_change_advert_table
 */
class m200502_135112_change_advert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE `advert`
	        ALTER `source_id` DROP DEFAULT');
        $this->execute('ALTER TABLE `advert`
            CHANGE COLUMN `source_code` `source_code` VARCHAR(16) NULL DEFAULT NULL AFTER `seller_id`,
            CHANGE COLUMN `source_id` `source_id` INT(11) NOT NULL AFTER `source_code`,
            CHANGE COLUMN `url` `url` VARCHAR(256) NULL DEFAULT NULL AFTER `source_id`,
            CHANGE COLUMN `expired` `expired` INT(11) NULL DEFAULT NULL AFTER `created`');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200502_135112_change_advert_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200502_135112_change_advert_table cannot be reverted.\n";

        return false;
    }
    */
}
