<?php

use yii\db\Migration;

/**
 * Class m181203_100939_init_data_user
 */
class m181203_100939_init_data_user extends Migration
{
    public static $data = [
        [
            'user-data' => [
                'id' => 2,
                'username' => 'Achim.Admin',
                'email' => 'achim@admin.de',
                'password_hash' => '$2y$10$PZ.1uq3gowRinz1U2HwQAuSaTIO2tPLz3Dvi1IifZpftmhlwZB2FC', // Achim.Admin
                'auth_key' => 'IB1nX2mZrO',
                'confirmed_at' => 1529676031,
                'created_at' => 1529676031
            ],
            'role' => 'Admin'
        ],
        [
            'user-data' => [
                'id' => 3,
                'username' => 'Bernd.Beispiel',
                'email' => 'bernd@beispiel.de',
                'password_hash' => '$2y$10$rI/6ZN0yX3cNp1VDWcB2PeEVHAtPxtHY07MGw.ydf6nG.ernLzgRq', // Bernd.Beispiel
                'auth_key' => 'PeEVHAtPxtHY07MGw',
                'confirmed_at' => 1529676031,
                'created_at' => 1529676031
            ],
            'role' => 'Nutzer'
        ],
        [
            'user-data' => [
                'id' => 4,
                'username' => 'Tom.Test',
                'email' => 'tom@test.de',
                'password_hash' => '$2y$10$5CNB80tohzSJhTA73BQTnediwZUM4vSyU6g5DVrH6lzKYfBkSdYB.', // Tom.Test
                'auth_key' => '5DVrH6lzKYfBkSdYB',
                'confirmed_at' => 1529676031,
                'created_at' => 1529676031
            ],
            'role' => 'Nutzer'
        ],
    ];



    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach (self::$data as $datum) {
            $this->insert('user', $datum['user-data']);
            Yii::$app->authManager->assign(
                Yii::$app->authManager->getRole($datum['role']),
                \app\models\User::find()->max('id')
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $authManager = Yii::$app->authManager;
        foreach (self::$data as $datum) {
            $user = \app\models\User::findOne(['username'=>$datum['user-data']['username']]);
            $authManager->revoke(
                $authManager->getRole($datum['role']),
                $user->id
            );
            $user->delete();
        }
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
