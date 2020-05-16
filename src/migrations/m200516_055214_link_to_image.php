<?php

use yii\db\Migration;

/**
 * Class m200516_055214_link_to_image
 */
class m200516_055214_link_to_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE `image`
	        ADD COLUMN `name` VARCHAR(128) NOT NULL DEFAULT \'\' AFTER `height`');
        $this->execute('CREATE TABLE `image_link` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `from_image_id` INT UNSIGNED NOT NULL,
            `to_image_id` INT UNSIGNED NOT NULL,
            `x` INT UNSIGNED NOT NULL,
            `y` INT UNSIGNED NOT NULL,
            PRIMARY KEY (`id`)
        )
        COLLATE=\'utf8_general_ci\'');
        $this->execute('ALTER TABLE `image_link`
            ADD CONSTRAINT `FK_image_link_image` FOREIGN KEY (`from_image_id`) REFERENCES `image` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
            ADD CONSTRAINT `FK_image_link_image_2` FOREIGN KEY (`to_image_id`) REFERENCES `image` (`id`) ON UPDATE CASCADE ON DELETE CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200516_055214_link_to_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200516_055214_link_to_image cannot be reverted.\n";

        return false;
    }
    */
}
