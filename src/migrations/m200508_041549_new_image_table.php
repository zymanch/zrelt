<?php

use yii\db\Migration;

/**
 * Class m200508_041549_new_image_table
 */
class m200508_041549_new_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE `image` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `advert_id` INT UNSIGNED NOT NULL,
            `type` ENUM(\'image\',\'panorama\') NOT NULL DEFAULT \'image\',
            `width` MEDIUMINT NOT NULL,
            `height` MEDIUMINT NOT NULL,
            `filename` VARCHAR(128) NOT NULL,
            `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`id`),
            CONSTRAINT `FK__advert` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
        )
        COLLATE=\'utf8_general_ci\'
');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200508_041549_new_image_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200508_041549_new_image_table cannot be reverted.\n";

        return false;
    }
    */
}
