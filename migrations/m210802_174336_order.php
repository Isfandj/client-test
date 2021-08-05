<?php

use yii\db\Migration;

/**
 * Class m210802_174336_order
 */
class m210802_174336_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE `orders` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT(10) UNSIGNED NOT NULL , `amount` INT NOT NULL , `service_id` INT NOT NULL , `create_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;"');
        $this->execute("ALTER TABLE `orders` ADD `status` INT(11) NOT NULL DEFAULT '0' AFTER `create_time`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210802_174336_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210802_174336_order cannot be reverted.\n";

        return false;
    }
    */
}
