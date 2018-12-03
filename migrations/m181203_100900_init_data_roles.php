<?php

use yii\db\Migration;

/**
 * Class m181203_100939_init_data_user
 */
class m181203_100900_init_data_roles extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $authManager = Yii::$app->authManager;
        $authManager->add($authManager->createRole('Nutzer'));
        $authManager->add($authManager->createRole('Admin'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $authManager = Yii::$app->authManager;
        $authManager->remove($authManager->getRole('Nutzer'));
        $authManager->remove($authManager->getRole('Admin'));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181203_100939_init_data_user cannot be reverted.\n";

        return false;
    }
    */
}
